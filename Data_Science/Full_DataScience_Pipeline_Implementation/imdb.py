from requests import get
url = 'http://www.imdb.com/search/title?release_date=2017&sort=num_votes,desc&page=1'
response = get(url)
print(len(response.text))

from bs4 import BeautifulSoup
html_soup = BeautifulSoup(response.text, 'html.parser')
type(html_soup)

movie_containers = html_soup.find_all('div', class_ = 'lister-item mode-advanced')
"""
print(movie_containers[0].find('div',class_='lister-item-content'))
first_movie=movie_containers[0].find('div',class_='lister-item-content')
first_movie.div
first_movie.a
first_movie.h3
first_movie.h3.a
##Name
first_name = first_movie.h3.a.text
first_name

##Year
first_year = first_movie.h3.find('span', class_ = 'lister-item-year text-muted unbold').text
first_year

## Year of release
first_imdb = float(first_movie.strong.text)
first_imdb

## Meta Score
first_mscore = first_movie.find('span', class_ = 'metascore favorable')
first_mscore = int(first_mscore.text)
print(first_mscore)

## NO of votes
first_votes = int(first_movie.find('span', attrs = {'name':'nv'})['data-value'])
first_votes

##Gross
gross =first_movie.find_all('span', attrs = {'name':'nv'})[1]['data-value']
gross

## Movie description
movie_desc=first_movie.find_all('p', class_ = 'text-muted')[1].text
movie_desc

##Movie details
movie_det=first_movie.find_all('p', class_ = 'text-muted')
movie_det
## Movie duration
movie_dur=movie_det.find('span',class_='runtime').text
movie_dur

## Movie Genre
movie_genre=movie_det.find('span',class_='genre').text
movie_genre


for container in movie_containers[:3]:
    if container.find('div', class_ = 'ratings-metascore') is not None:
        gross_inc =container.find_all('span', attrs = {'name':'nv'})[1]['data-value']
        print(gross_inc)
"""
##################################################################################
##################################################################################

# Lists to store the scraped data in
names = []
years = []
imdb_ratings = []
metascores = []
votes = []
#gross=[] #many movies have no record
movie_description=[]
movie_duration=[]
movie_genre=[]
# Extract data from individual movie container
for container in movie_containers:
# If the movie has Metascore, then extract:
    if container.find('div', class_ = 'ratings-metascore') is not None:
# The name
        name = container.h3.a.text
        names.append(name)
# The year
        year = container.h3.find('span', class_ = 'lister-item-year').text
        years.append(year)
# The IMDB rating
        imdb = float(container.strong.text)
        imdb_ratings.append(imdb)
# The Metascore
        m_score = container.find('span', class_ = 'metascore').text
        metascores.append(int(m_score))
# The number of votes
        vote = container.find('span', attrs = {'name':'nv'})['data-value']
        votes.append(int(vote))
# Gross income of movie
        #gross_inc =container.find_all('span', attrs = {'name':'nv'})[1]['data-value']
        #gross.append(gross_inc)

# movie description
        movie_desc=container.find_all('p', class_ = 'text-muted')[1].text
        movie_description.append(movie_desc)
        movie_det=container.find_all('p', class_ = 'text-muted')[0]


# Movie duration
        movie_dur=movie_det.find('span',class_='runtime').text
        movie_duration.append(movie_dur)

# Movie genre
        movie_gen=movie_det.find('span',class_='genre').text
        movie_genre.append(movie_gen)

import pandas as pd
one_df = pd.DataFrame({'movie': names,
'year': years,
'imdb': imdb_ratings,
'metascore': metascores,
'votes': votes,
#'gross':gross,
'movie decription':movie_description,
'movie duration':movie_duration,
'movie genre':movie_genre
})
print(one_df.info())
one_df.to_csv('50_movie_details.csv')

########################################################################################
########################################################################################
from IPython.core.display import clear_output

headers = {"Accept-Language": "en-US, en;q=0.5"}
pages = [str(i) for i in range(1,5)]
years_url = [str(i) for i in range(2000,2018)]
from time import sleep
from random import randint
from time import time
start_time = time()
requests = 0
for _ in range(5):
# A request would go here
    requests += 1
    sleep(randint(1,3))
    elapsed_time = time() - start_time
    print('Request: {}; Frequency: {} requests/s'.format(requests, requests/elapsed_time))


for year_url in years_url:

    # For every page in the interval 1-4
    for page in pages:

        # Make a get request
        response = get('http://www.imdb.com/search/title?release_date=' + year_url +
        '&sort=num_votes,desc&page=' + page, headers = headers)

        # Pause the loop
        sleep(randint(8,15))

        # Monitor the requests
        requests += 1
        elapsed_time = time() - start_time
        print('Request:{}; Frequency: {} requests/s'.format(requests, requests/elapsed_time))
        clear_output(wait = True)

        # Throw a warning for non-200 status codes
        #if response.status_code != 200:
            #warn('Request: {}; Status code: {}'.format(requests, response.status_code))

        # Break the loop if the number of requests is greater than expected
        #if requests > 72:
            #warn('Number of requests was greater than expected.')
        #    print('itne request mat karo')
         #   break

        # Parse the content of the request with BeautifulSoup
        page_html = BeautifulSoup(response.text, 'html.parser')

        # Select all the 50 movie containers from a single page
        mv_containers = page_html.find_all('div', class_ = 'lister-item mode-advanced')

        for container in movie_containers:
# If the movie has Metascore, then extract:
            if container.find('div', class_ = 'ratings-metascore') is not None:
# The name
                name = container.h3.a.text
                names.append(name)
# The year
                year = container.h3.find('span', class_ = 'lister-item-year').text
                years.append(year)
# The IMDB rating
                imdb = float(container.strong.text)
                imdb_ratings.append(imdb)
# The Metascore
                m_score = container.find('span', class_ = 'metascore').text
                metascores.append(int(m_score))
# The number of votes
                vote = container.find('span', attrs = {'name':'nv'})['data-value']
                votes.append(int(vote))
# Gross income of movie
        #gross_inc =container.find_all('span', attrs = {'name':'nv'})[1]['data-value']
        #gross.append(gross_inc)

# movie description
                movie_desc=container.find_all('p', class_ = 'text-muted')[1].text
                movie_description.append(movie_desc)
                movie_det=container.find_all('p', class_ = 'text-muted')[0]


# Movie duration
                movie_dur=movie_det.find('span',class_='runtime').text
                movie_duration.append(movie_dur)

# Movie genre
                movie_gen=movie_det.find('span',class_='genre').text
                movie_genre.append(movie_gen)



import pandas as pd
final_df = pd.DataFrame({'movie': names,
'year': years,
'imdb': imdb_ratings,
'metascore': metascores,
'votes': votes,
#'gross':gross,
'movie decription':movie_description,
'movie duration':movie_duration,
'movie genre':movie_genre
})
print(final_df.info())
final_df.to_csv('final_movie_details.csv')








