#맥주이름 크롤링
from selenium import webdriver

driver = webdriver.Chrome(executable_path = './chromedriver')
url="https://www.beeradvocate.com/beer/top-rated/"
driver.get(url)
driver.implicitly_wait(5)

beers=driver.find_elements_by_css_selector('#ba-content > table > tbody > tr > td:nth-child(2) > a > b')
scores=driver.find_elements_by_css_selector('#ba-content > table > tbody > tr > td:nth-child(4) > b')

for i in range(250):
    print("'"+beers[i].text+"'", scores[i].text)
