// 搭建服务器的框架
var express = require("express");
//获取连接mongodb数据库的对象
var MongodbClient = require("mongodb").MongoClient;
//连接数据库的地址，最后为数据库的名字
var mongoURL = 'mongodb://localhost:27017/mydatabase';

var app = express();
app.listen(8080);
app.use(express.static(__dirname + '/static'));
app.set('view engine', 'ejs');
app.set('views', __dirname + '/view');
//处理英雄列表页面的路由
app.get("/hero", function(req, res) {

    //读取数据库中的英雄信息
    MongodbClient.connect(mongoURL, function(err, db) {

        if (!err) {

            var heroCollection = db.collection("hero2");

            heroCollection.find({}).toArray(function(err, docs) {
                var data = {
                    hero2: docs

                };
                //console.log(docs)
                //根据查询到的数据，生成动态的英雄列表页面
                res.render("herolist", data);

            });
        }
    });

});
//处理英雄详情页面的路由
app.get("/:heroname", function(req, res) {
    // 取出英雄的名字
    var heroname = req.params.heroname;
    // 查询该英雄的详情

    //读取数据库中的英雄信息
    MongodbClient.connect(mongoURL, function(err, db) {

        if (!err) {

            var heroCollection = db.collection("hero2");

            heroCollection.find({ heroname: req.params.heroname }).toArray(function(err, docs) {
                if (!err) {
                    // 获取英雄对象
                    var hero = docs[0];
                    //根据查询到的数据，生成动态的英雄详情页面
                    res.render("herodetail", {
                        hero: docs[0]
                    });
                }




            });
        }
    });

});
