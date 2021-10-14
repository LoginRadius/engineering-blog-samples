
import bson
from pymongo import MongoClient
from werkzeug.security import generate_password_hash, check_password_hash

cliient = MongoClient("mongodb://localhost:27017/myDatabase")
db = cliient.myDatabase

class Books:
    def __init__(self):
        return
    
    def create(self, title="", description="", image_url="", category="", user_id=""):
        book = self.get_by_user_id_and_title(user_id, title)
        if book:
            return
        new_book = db.books.insert_one(
            {
                "title": title,
                "description": description,
                "image_url": image_url,
                "category": category,
                "user_id": user_id
            }
        )
        return self.get_by_id(new_book.inserted_id)
    
    def get_all(self):
        books = db.books.find()
        return [{**book, "_id": str(book["_id"])} for book in books]
    
    def get_by_id(self, book_id):
        book = db.books.find_one({"_id": bson.ObjectId(book_id)})
        if not book:
            return
        book["_id"] = str(book["_id"])
        return book
    
    def get_by_user_id(self, user_id):
        books = db.books.find({"user_id": user_id})
        return [{**book, "_id": str(book["_id"])} for book in books]

    def get_by_category(self, category):
        books = db.books.find({"category": category})
        return [book for book in books]

    def get_by_user_id_and_category(self, user_id, category):
        books = db.books.find({"user_id": user_id, "category": category})
        return [{**book, "_id": str(book["_id"])} for book in books]

    def get_by_user_id_and_title(self, user_id, title):
        book = db.books.find_one({"user_id": user_id, "title": title})
        if not book:
            return
        book["_id"] = str(book["_id"])
        return book

    def update(self, book_id, title="", description="", image_url="", category="", user_id=""):
        data={}
        if title: data["title"]=title
        if description: data["description"]=description
        if image_url: data["image_url"]=image_url
        if category: data["category"]=category

        book = db.books.update_one(
            {"_id": bson.ObjectId(book_id)},
            {
                "$set": data
            }
        )
        book = self.get_by_id(book_id)
        return book
    
    def delete(self, book_id):
        book = db.books.delete_one({"_id": bson.ObjectId(book_id)})
        return book

    def delete_by_user_id(self, user_id):
        book = db.books.delete_many({"user_id": bson.ObjectId(user_id)})
        return book


class User:
    def __init__(self):
        return
    
    def create(self, name="", email="", password=""):
        user = self.get_by_email(email)
        if user:
            return
        new_user = db.users.insert_one(
            {
                "name": name,
                "email": email,
                "password": self.encrypt_password(password),
                "active": True
            }
        )
        return self.get_by_id(new_user.inserted_id)
    
    def get_all(self):
        users = db.users.find({"active": True})
        return [{**user, "_id": str(user["_id"])} for user in users]
    
    def get_by_id(self, user_id):
        user = db.users.find_one({"_id": bson.ObjectId(user_id), "active": True})
        if not user:
            return
        user["_id"] = str(user["_id"])
        return user
    
    def get_by_email(self, email):
        user = db.users.find_one({"email": email, "active": True})
        if not user:
            return
        user["_id"] = str(user["_id"])
        return user

    def update(self, user_id, name=""):
        data = {}
        if name:
            data["name"] = name
        user = db.users.update_one(
            {"_id": bson.ObjectId(user_id)},
            {
                "$set": data
            }
        )
        user = self.get_by_id(user_id)
        return user
    
    def delete(self, user_id):
        Books().delete_by_user_id(user_id)
        user = db.users.delete_one({"_id": bson.ObjectId(user_id)})
        user = self.get_by_id(user_id)
        return user

    def disable_account(self, user_id):
        user = db.users.update_one(
            {"_id": bson.ObjectId(user_id)}, 
            {"$set": {"active": False}}
        )
        user = self.get_by_id(user_id)
        return user

    def encrypt_password(self, password):
        return generate_password_hash(password)
    
    def login(self, email, password):
        user = self.get_by_email(email)
        if not user or not check_password_hash(user["password"], password):
            return user
        return user
