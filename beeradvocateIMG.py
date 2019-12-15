import requests
from selenium import webdriver
from bs4 import BeautifulSoup

driver = webdriver.Chrome(executable_path = r"./chromedriver.exe")
url="https://www.beeradvocate.com/beer/top-rated/"
driver.get(url)
driver.implicitly_wait(5)

beers=driver.find_elements_by_css_selector('#ba-content > table > tbody > tr > td:nth-child(2) > a > b')
beer_1 = driver.find_elements_by_css_selector('#ba-content > table > tbody > tr > td:nth-child(2) > a')
scores=driver.find_elements_by_css_selector('#ba-content > table > tbody > tr > td:nth-child(4) > b')
link = ['0']*10
img_div = ['0']*10
img = ['0']*10
        



for i in range(10):
    link[i] = beer_1[i].get_attribute("href")
    url=link[i]
    response = requests.get(url)
    source = response.text
    soup = BeautifulSoup(source, 'html.parser')

    img_div[i]=soup.find(id="main_pic_mobile")
    img[i]=img_div[i].find("img")["src"]

    
for i in range(10):
    print("'",img[i],"'")
    



