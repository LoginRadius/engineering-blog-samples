from bson.objectid import ObjectId
import re

def validate(data, regex):
    return True if re.match(regex, data) else False

def validate_password(password: str):
    reg = r"\b^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!#%*?&]{8,20}$\b"
    return validate(password, reg)

def validate_email(email: str):
    regex = r'\b[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Z|a-z]{2,}\b'
    return validate(email, regex)

def validate_book(**args):
    if not args.get('title') or not args.get('image_url') or not args.get('category') or not args.get('user_id'):
        return
    if args.get('category') not in ['romance', 'peotry', 'politics' 'picture book', 'science', 'fantasy', 'horror', 'thriller']:
        return
    if type(args.get('user_id')) != ObjectId:
        return  
    if type(args.get('title')) != str or type(args.get('description')) != str \
        or type(args.get('image_url')) != str:
        return
    return True

def validate_user(**args):
    if  not args.get('email') or not args.get('password') or not args.get('name'):
        return
    if type(args.get('name')) != str or type(args.get('email')) != str or type(args.get('password')) != str:
        return
    if not validate_email(args.get('email')):
        return
    if not validate_password(args.get('password')):
        return
    if not ( 2 <= len(args['name'].split(' ')) <= 3):
        return
    return True

def validate_email_and_password(email, password, **args):
    if not (email and password):
        return False
    if not validate_email(email):
        return False
    if not validate_password(password):
        return False
    return True

    