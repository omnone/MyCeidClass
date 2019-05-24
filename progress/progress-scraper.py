import os
from csv import DictWriter

from selenium import webdriver
from selenium.common.exceptions import TimeoutException
from selenium.webdriver.common.by import By
from selenium.webdriver.support import expected_conditions as EC
from selenium.webdriver.support.ui import WebDriverWait
from selenium.webdriver.firefox.options import Options
import sys

# ***DISCLAIMER: To sigkekrimeno programma anaptixthike sta plaisia tou mathimatos gia akadimaikous logous.
# Gia tin pragmatopoihsh scraping se opoiadipote selida apaititai adeia tou katoxou tis.

##################################################################################################################


def wait_for_element(delay, element):
    """Wait for the element to appear on the webpage before continuing"""
    try:
        myElem = WebDriverWait(browser, delay).until(
            EC.presence_of_element_located((By.ID, element)))
        # print(f"[+]Page is ready , \'{element}\' found")
    except TimeoutException:
        # print("[-]Waiting took too much time!")
        pass


##################################################################################################################
def login(user, passw):
    """Do the required login"""
    # print(f'[*] Trying log in with username: \'{user}\'')
    username = browser.find_element_by_id("inputEmail")  # username form field
    password = browser.find_element_by_id(
        "inputPassword")  # password form field

    username.send_keys(user)
    password.send_keys(passw)

    browser.find_element_by_css_selector(
        '.btn.btn-lg.btn-primary.btn-block').click()


##################################################################################################################
def get_lessons():
    """Finds specific elements from the HTML source code in order to get their values"""
    wait_for_element(5, 'contentAreaFrame')

    frame1 = WebDriverWait(browser, delay).until(
        EC.frame_to_be_available_and_switch_to_it((By.ID, 'contentAreaFrame')))

    # frame1 = browser.find_element_by_id('contentAreaFrame')
    # browser.switch_to.frame(frame1)

    wait_for_element(10, 'isolatedWorkArea')

    frame2 = WebDriverWait(browser, delay).until(
        EC.frame_to_be_available_and_switch_to_it((By.ID, 'isolatedWorkArea')))
    # frame2 = browser.find_element_by_id('isolatedWorkArea')
    # browser.switch_to.frame(frame2)

    # print(frame2)
    wait_for_element(20, 'WD3F-contentTBody')
    lessons_table = browser.find_element_by_id('WD3F-contentTBody')

    # print(lessons_table)

    wait_for_element(5, 'WD10AA')
    # print(browser.find_element_by_id('WD10AA').text)#mesos oros

    # get all of the rows in the table
    return lessons_table.find_elements_by_xpath(".//tr")


##################################################################################################################

def alternative_lessons():
    """Finds specific elements from the HTML source code in order to get their values - dirty workaround because progress don't like scraping it"""
    wait_for_element(5, 'contentAreaFrame')

    frame1 = WebDriverWait(browser, delay).until(
        EC.frame_to_be_available_and_switch_to_it((By.ID, 'contentAreaFrame')))

    # frame1 = browser.find_element_by_id('contentAreaFrame')
    # browser.switch_to.frame(frame1)

    wait_for_element(20, 'isolatedWorkAreaForm')
    lessons_table = browser.find_element_by_id('isolatedWorkAreaForm')
    val = lessons_table.get_attribute("action")

    # print(val)

    browser.get(val)

    wait_for_element(10, 'WD3F-contentTBody')
    browser.refresh()
    wait_for_element(10, 'WD3F-contentTBody')
    lessons_table = browser.find_element_by_id('WD3F-contentTBody')

    wait_for_element(5, 'WD10AA')
    # print(browser.find_element_by_id('WD10AA').text)#mesos oros

    # get all of the rows in the table
    return lessons_table.find_elements_by_xpath(".//tr")

    # return lessons_table.find_elements_by_xpath(".//tr")  # get all of the rows in the table


##################################################################################################################
def save_results_csv(xrostoumena, perasmena):
    """Export data to a csv file"""
    # print('[+]Writing data to .csv file')

    # print(perasmena)

    path = (os.path.abspath(os.path.join(os.path.abspath(__file__), os.pardir)).replace(
        "\\progress", "\\storage\\app\\public\\grades_files"))

    with open(path+"\\grades.csv", mode='w', newline='') as file:
        headers = ['Όνομα Μαθήματος', 'Περίοδος', 'Εξάμηνο', 'Βαθμός']
        csv_writer = DictWriter(file, delimiter=',',
                                quotechar='"', fieldnames=headers)
        csv_writer.writeheader()

        for row in xrostoumena:
            csv_writer.writerow({
                'Όνομα Μαθήματος': row[0],
                'Περίοδος': row[1],
                'Εξάμηνο': row[2],
                'Βαθμός': 0.0
            })

        for row in perasmena:
            csv_writer.writerow({
                'Όνομα Μαθήματος': row[0],
                'Περίοδος': row[1],
                'Εξάμηνο': row[2],
                'Βαθμός': row[3]
            })


##################################################################################################################
def calculate_ECTS(ects, xeim, ear, period):
    ects = int(ects.replace(',00', ''))
    if period == 'Χειμερινό Εξάμηνο':
        xeim += ects
    else:
        ear += ects

    return xeim, ear


##################################################################################################################
def data_manipulation(rows):
    sorted_lessons = []
 
    for row in rows:
        if row.find_elements_by_xpath(".//td")[0] != ' ':
            lesson = [td.text for td in row.find_elements_by_xpath(
                ".//td") if td.text != '']
            if len(lesson) > 10:
                sorted_lessons.append(lesson)


    seen = []
    xrostoumena = []
    perasmena = []

    # mo = 0.0
    # sinoliko_varos = 0.0
    ECTS_xeim = 0
    ECTS_ear = 0

    for item in sorted(sorted_lessons, key=lambda grade: grade[4]):
        temp_lesson = []
        lesson_name = item[3]

        if len(item) >= 19 and lesson_name not in seen:
            seen.append(lesson_name)
            try:
                grade = float(item[4].replace(',', '.'))

                if int(grade) >= 5:
                    temp_lesson = [lesson_name, item[6],
                                   item[19], grade]
                    perasmena.append(temp_lesson)

                else:
                    temp_lesson = [lesson_name, item[6], item[19], item[10]]
                    xrostoumena.append(temp_lesson)
                    # ECTS_xeim, ECTS_ear = calculate_ECTS(
                    #     item[10], ECTS_xeim, ECTS_ear, item[6])

            except TypeError:
                if item[4] == 'NS' or item[4] == ' ':
                    temp_lesson = [lesson_name, item[6], item[19], item[10]]
                    xrostoumena.append(temp_lesson)
                    # ECTS_xeim, ECTS_ear = calculate_ECTS(
                    #     item[10], ECTS_xeim, ECTS_ear, item[6])

            except ValueError:
                if item[4] == 'NS' or item[4] == ' ':
                    temp_lesson = [item[3], item[6], item[19], item[10]]
                    xrostoumena.append(temp_lesson)
                    # ECTS_xeim, ECTS_ear = calculate_ECTS(
                    #     item[10], ECTS_xeim, ECTS_ear, item[6])

    return xrostoumena, perasmena


##################################################################################################################

#prevent firefox from opening windows
options = Options()

options.headless = True
browser = webdriver.Firefox(
    options=options, executable_path=os.path.dirname(os.path.abspath(__file__))+"\\geckodriver.exe")

browser.get("https://progress.upatras.gr")

# login to progress.upatras.gr
print(sys.argv)
login(sys.argv[1], sys.argv[2])

wait_for_element(5, 'welcomeText')

# navigate to page behind login
browser.get("https://progress.upatras.gr/irj/portal")

wait_for_element(5, 'OL2N11')

delay = 5
WebDriverWait(browser, delay).until(
    EC.invisibility_of_element_located((By.ID, 'divLoadingBackground')))
browser.find_element_by_id("0L2N11").click()

# get lessons information from table
try:
    # lessons = get_lessons()
    lessons = alternative_lessons()
finally:
    # close browser
    # browser.close()
    pass


try:
    # save results to csv file
    xrostoumena, perasmena = data_manipulation(lessons)
    save_results_csv(xrostoumena, perasmena)
finally:
    # close browser
    browser.close()
