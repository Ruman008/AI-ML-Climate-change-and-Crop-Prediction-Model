from lib2to3.fixes.fix_tuple_params import find_params
import pandas as pd
import numpy as np
import json
import sys

from sklearn.model_selection import train_test_split

# Get the input parameters as command line arguments
jsonmaxt = sys.argv[1]
jsonmt = sys.argv[2]
jsoncc = sys.argv[3]
jsonhu = sys.argv[4]
jsonsunh = sys.argv[5]
jsonheatin = sys.argv[6]
jsonprecip = sys.argv[7]
jsonpres = sys.argv[8]
jsonwinds = sys.argv[9]

# Parse the JSON strings into Python objects
maxt_params = json.loads(jsonmaxt)
mt_params = json.loads(jsonmt)
cc_params = json.loads(jsoncc)
hu_params = json.loads(jsonhu)
sunh_params = json.loads(jsonsunh)
heatin_params = json.loads(jsonheatin)
precip_params = json.loads(jsonprecip)
pres_params = json.loads(jsonpres)
winds_params = json.loads(jsonwinds)

#Read the dataset
dataset = pd.read_csv('ML/Temperature_prediction/nagpur.csv')

weather_df = pd.read_csv('nagpur.csv', parse_dates=['date_time'], index_col='date_time')
weather_df.head(5)

weather_df.columns

weather_df.shape

weather_df.isnull().any()

weather_df_num=weather_df.loc[:,['maxtempC','mintempC','cloudcover','humidity','tempC', 'sunHour','HeatIndexC', 'precipMM', 'pressure','windspeedKmph']]
weather_df_num.head()

weather_df_num.shape

weather_df_num.columns

weather_y=weather_df_num.pop("tempC")
weather_x=weather_df_num

train_X,test_X,train_y,test_y=train_test_split(weather_x,weather_y,test_size=0.2,random_state=4)

train_X.shape
train_y.shape
train_y.head()



#Train the model using the Random Forest Classifier algorithm
from sklearn.ensemble import RandomForestRegressor
regr= RandomForestRegressor(max_depth = 90, random_state = 0, n_estimators = 100,)
regr.fit(train_X, train_y)

RandomForestRegressor(max_depth=90,random_state=0)

prediction3=regr.predict(test_X)
np.mean(np.absolute(prediction3-test_y))

#Get the user inputs and store them in a numpy array
#user_input = np.array([[90,42,43,21,82,6.5,203]]) - ans is rice.
user_input = np.array([[maxt_params,mt_params,cc_params,hu_params,sunh_params,heatin_params,precip_params,pres_params,winds_params]])

#Make predictions using the trained model
prediction3 = regr.predict(user_input)

#Print the predicted crop
print(str(prediction3[0]))
