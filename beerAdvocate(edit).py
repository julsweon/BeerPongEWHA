import requests
from selenium import webdriver
from bs4 import BeautifulSoup

driver = webdriver.Chrome(executable_path = r"C:\Chrome\chromedriver.exe")
url="https://www.beeradvocate.com/beer/top-rated/"
driver.get(url)
driver.implicitly_wait(5)

beers=driver.find_elements_by_css_selector('#ba-content > table > tbody > tr > td:nth-child(2) > a > b')
beer_1 = driver.find_elements_by_css_selector('#ba-content > table > tbody > tr > td:nth-child(2) > a')
scores=driver.find_elements_by_css_selector('#ba-content > table > tbody > tr > td:nth-child(4) > b')
link = ['0']*20
origin = ['0']*20
rate = ['0']*20

        



for i in range(20):
    link[i] = beer_1[i].get_attribute("href")
    url=link[i]
    response = requests.get(url)
    source = response.text
    soup = BeautifulSoup(source, 'html.parser')
    
    dd=soup.findAll('dd', class_="beerstats")
    origin[i] = dd[7].findAll('a')

    view = soup.findAll('div', class_='user-comment')
    rate[i] = view[3].find('span', class_='muted')
    
for i in range(20):
    print(i+1, "'"+beers[i].text+"'", scores[i].text, end=" '")
    for j in origin[i]:
        print(j.get_text(), end=" ")
    print("'", "'"+rate[i].get_text()+"'")
        
    



