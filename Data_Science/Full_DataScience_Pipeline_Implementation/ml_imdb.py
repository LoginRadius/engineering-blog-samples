import pandas as pd
from matplotlib import pyplot
import os
os.chdir('/Desktop/web_scraping/')
data=pd.read_csv('final_movie_details.csv')

# plot
pyplot.scatter(data['imdb'],data['metascore'])
pyplot.show()

# plot
pyplot.scatter(data['metascore'],data['votes'])
pyplot.show()

# We can see a bit of linear relationship between imdb score and metascore lets try linear regression on it

## ML model

X = data.loc[:, 'metascore'].values
y = data.loc[:, 'imdb'].values

# Splitting the dataset into the Training set and Test set
from sklearn.cross_validation import train_test_split
X_train, X_test, y_train, y_test = train_test_split(X, y, test_size = 0.33, random_state = 0)

from sklearn.linear_model import LinearRegression

regressor = LinearRegression()#making object for reg package
regressor.fit(X_train.reshape(-1,1), y_train.reshape(-1,1))#to fit the regressor to our training data

#predict the test results
y_pred =regressor.predict(X_test.reshape(-1,1))

#Now if we compare y_Pred and y_test we can see the current salary and model predicted salary in y_pred
pyplot.scatter(X_train, y_train, color = 'red')
pyplot.plot(X_train, regressor.predict(X_train.reshape(-1,1)), color = 'blue')
#we have plotted the line where real salary in x axis and
#predicted salary in y axis  and we observe thatfew obs which are on line means its quite accurate i.e. real salary approx equal to predcted salary
pyplot.title('IMDB V/S METASCORE (Training set)')
pyplot.xlabel('Metascore')
pyplot.ylabel('IMDB')
pyplot.show()

# Visualising the Test set results
pyplot.scatter(X_test, y_test, color = 'red')
pyplot.plot(X_train, regressor.predict(X_train.reshape(-1,1)), color = 'blue')
pyplot.title('IMDB V/S METASCORE (Training set)')
pyplot.xlabel('Metascore')
pyplot.ylabel('IMDB')
pyplot.show()

from sklearn.metrics import mean_squared_error
mean_squared_error(y_test, y_pred)

# 0.18041462828221905
# Its a good score we are getting it means the meta score is having quite good linear relation with imdb

## Let try with imdb and votes
X1 = data.loc[:, ['metascore','votes']].values
y1 = data.loc[:, 'imdb'].values

# Splitting the dataset into the Training set and Test set
from sklearn.cross_validation import train_test_split
X_train, X_test, y_train, y_test = train_test_split(X1, y1, test_size = 0.33, random_state = 0)

from sklearn.linear_model import LinearRegression

regressor = LinearRegression()#making object for reg package
regressor.fit(X_train, y_train)#to fit the regressor to our training data

#predict the test results
y_pred =regressor.predict(X_test)


from sklearn.metrics import mean_squared_error
mean_squared_error(y_test, y_pred)
# 0.15729132122310804 good score

dur=data['movie duration'].value_counts()
#https://www.analyticsvidhya.com/blog/2017/08/introduction-to-multi-label-classification/
#https://www.analyticsvidhya.com/blog/2019/04/predicting-movie-genres-nlp-multi-label-classification/

### Soon will make a multilable text classfier as the movie description has multiple tags like some are action plus comedy etc.
