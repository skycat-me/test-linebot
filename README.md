# test-linebot

## heroku
```bash
# heroku cli install
brew install heroku

# login
heroku login

# undefined key
heroku keys:add

# add heroku env
heroku config:set LineMessageAPIChannelAccessToken={ChannelAccessToken}
heroku config:set LineMessageAPIChannelSecret={ChannelSecret}

# heroku create app
heroku create APPNAME

# git clone
git clone git@github.com:skycat-me/test-linebot.git

# git add remote
git remote add heroku git@heroku.com:APPNAME.git

# git push(heroku)
git push heroku master

# get Webhook url
heroku open
```
