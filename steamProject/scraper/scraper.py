import requests, string, random, mysql.connector
from bs4 import BeautifulSoup

db = mysql.connector.connect(
    host="127.0.0.1",
    user="root",
    password="",
    database="base"
)
cursor = db.cursor()

def generate_random_id(length, cursor):
    while True:
        random_id = random.randint(10**(length-1), (10**length)-1)
        cursor.execute("SELECT GameID FROM gamesdb")
        result = cursor.fetchall()
        ids = [row[0] for row in result]  # Extract the IDs from the result
        if random_id not in ids:
            return random_id


# print(results)

url = "https://store.steampowered.com/search/?term="
response = requests.get(url)
soup = BeautifulSoup(response.content, "html.parser")

results = soup.find(id="search_resultsRows")

data = results.find_all(["div", "a"], {"class": ["search_result_row"]})



counter_length = 40
counter = 0

for tag in data:
    title = None
    img_tag = None
    description = None
    check = None
    date = None
    price = None
    if tag.name == "a" and "search_result_row" in tag["class"]:
        redirect = tag["href"]
        if redirect:
            print("\n00 Success redirect: " + redirect)
            clean_url = redirect.split("?")[0]
            # print(clean_url)
            url = clean_url
            response = requests.get(url)
            soup = BeautifulSoup(response.content, "html.parser")
            results = soup.find(class_="responsive_page_template_content")
            data = results.find_all(["span", "div", "a"], {"class": ["game_description_snippet", "glance_tags", "game_purchase_price", "apphub_AppName", "date", "game_header_image_ctn"]})
            nestedCounter = 0
            for tag in data:
                if tag.name == "div" and "apphub_AppName" in tag["class"] and title is None:
                    title = tag.text.strip()
                    print("0 Success title: " + title)
                elif tag.name == "div" and "game_header_image_ctn" in tag["class"] and img_tag is None:
                    img_tag = tag.find("img")
                    if img_tag:
                        path = img_tag["src"]
                        print("1 Success image: " + path)
                elif tag.name == "div" and "game_description_snippet" in tag["class"] and description is None:
                    description = tag.text.strip()
                    print("2 Success description: " + description)
                elif tag.name == "div" and "date" in tag["class"] and date is None:
                    date = tag.text.strip()
                    print("3 Success date: " + date)
                elif tag.name == "div" and "glance_tags" in tag["class"] and check is None:
                    check = tag.find("a")
                    if check:
                        genre = check.text.strip()
                        print("4 Success genre: " + genre)
                elif tag.name == "div" and "game_purchase_price" in tag["class"] and price is None:
                    price = tag.text.strip()
                    print("5 Success price: " + price + "\n")



                    if all(var is not None for var in (title, description, genre, price, date, path)):
                        random_id = generate_random_id(6, cursor)   
                        user = 41
                        query = "INSERT INTO gamesdb (GameID, fromUser, title, description, genre, price, date, path) VALUES (%s, %s, %s, %s, %s, %s, %s, %s)"
                        data = (random_id, user, title, description, genre, price, date, path)
                        cursor.execute(query, data)
                        db.commit()
                        print("Upload success!")
                    else:
                        print("Error: Missing required data for upload")

    counter += 1
    if counter == counter_length:
        break
                    
    # GameID , fromUser, title 1, description 1, genre 1, price 1, (date), path 1

    



db.close()
