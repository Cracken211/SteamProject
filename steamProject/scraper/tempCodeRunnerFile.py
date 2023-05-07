
                # if all(var is not None for var in (random_id, user, title, description, genre, price, date, path)):
                #     random_id = generate_random_id(6, cursor)   
                #     user = 41
                #     query = "INSERT INTO gamesdb (GameID, fromUser, title, description, genre, price, date, path) VALUES (%s, %s, %s, %s, %s, %s, %s, %s)"
                #     data = (random_id, user, title, description, genre, price, date, path)
                #     cursor.execute(query, data)
                #     db.commit()
                #     print("Upload success!")
                # else:
                #     print("Error: Missing required data for upload")