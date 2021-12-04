import secrets
import os
from PIL import Image
from flask import current_app as app

def save_pic(picture):
    """Saves an image to disk"""
    file_name = secrets.token_hex(8) +os.path.splitext(picture.filename)[1]
    if not os.path.isdir(os.path.join(app.root_path, 'static')):
        os.mkdir(os.path.join(app.root_path,"static"))
        os.mkdir(os.path.join(app.root_path,"static/images"))
        os.mkdir(os.path.join(app.root_path,"static/images/books"))
    if not os.path.isdir(os.path.join(app.root_path, 'static/images')):
        os.mkdir(os.path.join(app.root_path,"static/images"))
        os.mkdir(os.path.join(app.root_path,"static/images/books"))
    if not os.path.isdir(os.path.join(app.root_path, 'static/images/books')):
        os.mkdir(os.path.join(app.root_path,"static/images/books"))
    file_path = os.path.join(app.root_path, "static/images/books", file_name)
    picture = Image.open(picture)
    picture.thumbnail((150, 150))
    picture.save(file_path)
    return file_name
