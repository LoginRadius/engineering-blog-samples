from instagram_private_api import Client, ClientCompatPatch
import numpy as np 
import time
import getpass 
import sys

def list_diff(li1, li2): 
    li_dif = [i for i in li1 + li2 if i not in li1] 
    return li_dif 

print("\n \nIMPORTANT DISCLAIMER: DO NOT USE THIS TOOL TOO FREQUENTLY (MORE THAN SEVERAL TIMES IN A MINUTE), YOUR ACCOUNT MIGHT GET FLAGGED! \n \n ")

USER_NAME = input("What is your instagram username? \n")
PASSWORD = getpass.getpass(prompt='What is your instagram password? (Your input might not appear on console, just type and press enter.) \n')

try: 
    api = Client(USER_NAME, PASSWORD)
except:
    sys.exit('Login unsucessful, wrong password?')

results = api.feed_timeline()
rnk_token = api.generate_uuid()
u_id = api.authenticated_user_id

fwing = api.user_following(u_id, rnk_token)
fwers = api.user_followers(u_id, rnk_token)
fwing_list = []
fwers_list = []
fwing_list.append(np.sort([fwing['users'][idx]['username'] for idx in np.arange(len(fwing['users']))]))
fwers_list.append(np.sort([fwers['users'][idx]['username'] for idx in np.arange(len(fwers['users']))]))
fwing_nmid = fwing['next_max_id']
fwers_nmid = fwers['next_max_id']

print('Parsing the following list! Please be patient. There is a delay to prevent your account from getting flagged!')
while (fwing_nmid is not None):
    time.sleep(5)
    fwing = api.user_following(u_id, rnk_token, max_id=fwing_nmid)
    fwing_list.append(np.sort([fwing['users'][idx]['username'] for idx in np.arange(len(fwing['users']))]))
    fwing_nmid = fwing['next_max_id']

print('Parsing the followers list! Please be patient. There is a delay to prevent your account from getting flagged!')
while (fwers_nmid is not None):
    time.sleep(5)
    fwers = api.user_followers(u_id, rnk_token, max_id=fwers_nmid)
    fwers_list.append(np.sort([fwers['users'][idx]['username'] for idx in np.arange(len(fwers['users']))]))
    fwers_nmid = fwers['next_max_id']
    
fwers_list_flat = [j for sub in fwers_list for j in sub]
fwing_list_flat = [j for sub in fwing_list for j in sub]

print('Here are the unfollowers! \n\n')
print(np.sort(list_diff(fwers_list_flat, fwing_list_flat)))

print('_________________________________________')
print('Here are the followers you are not following! \n\n')
print(np.sort(list_diff(fwing_list_flat, fwers_list_flat)))

os.system("pause")