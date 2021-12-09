"""Validator Module"""
import re
from bson.objectid import ObjectId

def validate(data, regex):
    """Custom Validator"""
    return True if re.match(regex, data) else False

def validate_password(password: str):
    """Password Validator"""
    reg = r"\b^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!#%*?&]{8,20}$\b"
    return validate(password, reg)

def validate_email(email: str):
    """Email Validator"""
    regex = r'\b[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Z|a-z]{2,}\b'
    return validate(email, regex)

def validate_book(**args):
    """Book Validator"""
    if not args.get('title') or not args.get('image_url') \
        or not args.get('category') or not args.get('user_id'):
        return {
            'title': 'Title is required',
            'image_url': 'Image URL is required',
            'category': 'Category is required',
            'user_id': 'User ID is required'
        }
    if args.get('category') not in ['romance', 'peotry', 'politics' 'picture book', 'science', 'fantasy', 'horror', 'thriller']:
        return {
            'status': 'error',
            'message': 'Invalid category'
        }
    try:
        ObjectId(args.get('user_id'))
    except:
        return {
            'user_id': 'User ID must be valid'
        }
    if not isinstance(args.get('title'), str) or not isinstance(args.get('description'), str) \
        or not isinstance(args.get('image_url'), str):
        return {
            'title': 'Title must be a string',
            'description': 'Description must be a string',
            'image_url': 'Image URL must be a string'
        }
    return True

def validate_user(**args):
    """User Validator"""
    if  not args.get('email') or not args.get('password') or not args.get('name'):
        return {
            'email': 'Email is required',
            'password': 'Password is required',
            'name': 'Name is required'
        }
    if not isinstance(args.get('name'), str) or \
        not isinstance(args.get('email'), str) or not isinstance(args.get('password'), str):
        return {
            'email': 'Email must be a string',
            'password': 'Password must be a string',
            'name': 'Name must be a string'
        }
    if not validate_email(args.get('email')):
        return {
            'email': 'Email is invalid'
        }
    if not validate_password(args.get('password')):
        return {
            'password': 'Password is invalid, Should be atleast 8 characters with \
                upper and lower case letters, numbers and special characters'
        }
    if not 2 <= len(args['name'].split(' ')) <= 30:
        return {
            'name': 'Name must be between 2 and 30 words'
        }
    return True

def validate_email_and_password(email, password):
    """Email and Password Validator"""
    if not (email and password):
        return {
            'email': 'Email is required',
            'password': 'Password is required'
        }
    if not validate_email(email):
        return {
            'email': 'Email is invalid'
        }
    if not validate_password(password):
        return {
            'password': 'Password is invalid, Should be atleast 8 characters with \
                upper and lower case letters, numbers and special characters'
        }
    return True
