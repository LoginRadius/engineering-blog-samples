import os
os.chdir('Desktop/web_scraping/imdb scrapper_ml/')

import pandas as pd

data=pd.read_csv('multilabel_nlp_classification.csv')

movie_list=[x for x in data['movie genre']]
movie_list1=''
for x in data['movie genre']:
    movie_list1+=','+x

li_m=movie_list1.split(',')
li=[x.strip() for x in li_m]
list_s=list(set(li))

for x in list_s:
    data[x]=0

data['movie_genre']=[x.strip().split(',') for x in data['movie genre']]

de=data.copy()
#data.loc[0,'Action']=1
de['id']=range(0,6116)
#print(de.loc[de['id']==0,'Action'])
for i in range(0,6116):
    for x in de.loc[de['id']==i,'movie_genre']:
        for y in x:
            y=y.strip()
            de.loc[de['id']==i,y]=1

de.to_csv('multilabel_nlp_classification.csv')

