var request = require("request");
var cheerio = require("cheerio");
//获取连接mongodb数据库的对象
var MongodbClient = require("mongodb").MongoClient;
//连接数据库的地址，最后为数据库的名字
var mongoURL = 'mongodb://localhost:27017/mydatabase';

request("http://lol.duowan.com/hero/", function(err, response, body) {
    if (err) {
        console.log(err);
    } else {
        //加载英雄列表页面
        var $ = cheerio.load(body);
        //从中取出英雄详情链接
        $("#champion_list>li>a").each(function(index, element) {

            //进一步请求该英雄的详情页面
            request($(element).attr("href"), function(err, response, body) {

                var $ = cheerio.load(body);
                //从详情页面中获取英雄称号
                var herotitle = $("h2.hero-title").text();
                //获取英雄名字
                var heroname = $("h1.hero-name").text();

                //获取英雄擅长的位置
                var position = [];
                $(".hero-position>span").each(function(index, element) {
                    position.push($(element).text());
                });

                //获取英雄的背景故事
                var bgstory = $("p.hero-popup__txt").text();

                //获取英雄皮肤小图
                var smallPic = [];
                $(".hero-skin__list>li>img").each(function(index, element) {
                    smallPic.push($(element).attr("src"));
                });

                //获取英雄皮肤大图
                var bigPic = [];
                $(".ui-slide__content>li>img").each(function(index, element) {
                    bigPic.push($(element).attr("src"));
                });

                //将信息组合成对象
                var hero = {
                    heroname: heroname,
                    herotitle: herotitle,
                    position: position,
                    bgstory: bgstory,
                    smallPic: smallPic,
                    bigPic: bigPic
                }

                console.log(hero);

                //将其存放到数据库中
                MongodbClient.connect(mongoURL, function(err, db) {
                    if (err) {
                        console.log(err);
                    } else {

                        //取集合对象

                        var heroConnection = db.collection("hero2");
                        //将数据库插入到数据库中
                        heroConnection.insert(hero2, function(err, result) {
                                if (err) {
                                    console.log(err)
                                } else {
                                    console.log('插入数据成功');
                                    db.close()
                                }
                            })
                            /*heroConnection.insert({

                                heroname: heroname,
                                herotitle: herotitle,
                                position: position,
                                bgstory: bgstory,
                                smallPic: smallPic,
                                bigPic: bigPic

                            })*/
                    }
                })

            });
        });
    }
});
