var express = require("express");
// 获取表单信息  post
var formidable = require("formidable");
// 解析处理请求头   cookie-parser
var cookieParser = require("cookie-parser");
//获取连接mongodb数据库的对象
var MongodbClient = require("mongodb").MongoClient;
//连接数据库的地址，最后为数据库的名字
var mongoURL = 'mongodb://localhost:27017/mydatabase';
// 引入加密
var crypto = require("crypto");
var app = express();


app.set("view engine", 'ejs');
app.set('views', __dirname + '/views');

app.listen(8080);
//静态文件服务
app.use(express.static(__dirname + "/static"));
// 使用cookieParser中间件
app.use(cookieParser())


app.get('/:path', function(req, res, next) {
    var path = req.params.path;
    // 如果用户输入的是一下路径表示要访问主页
    if (path === 'home' || path === "home.html" || path === 'index' || path === "index.html" || path === "index.php" || path === "index.jsp") {
        // 从cookie中取用户名，如果没有获取到cookie，那么值为''

        // 动态生成主页
        res.render("index", {
            username: req.cookies.userCookie
        });
    } else {
        // 如果处理不了，就转移路由处理权限
        next();
    }
});

//新用户注册服务
app.post("/new-user-regist", function(req, res) {

        //取出注册表单提交过来的信息

        //创建表单处理对象
        var form = new formidable.IncomingForm();
        //用它的parse方法解析请求体
        form.parse(req, function(err, fields, files) {

            //连接到数据库服务器
            MongodbClient.connect(mongoURL, function(err, db) {

                if (err) {
                    console.log(err);
                } else {
                    //获取集合对象
                    var userCollection = db.collection("user");

                    //将数据插入数据库中
                    userCollection.insert({
                        username: fields.username,
                        // 加密
                        password: mCrypto(fields.password),
                        email: fields.email
                    }, function(err, result) {
                        if (err) {
                            console.log(err);
                        } else {
                            if (result.ops.insertedCount != 0) {
                                console.log('注册成功');
                                res.redirect('/registok.html');
                            }
                        }
                    });
                }
            });

        })
    })
    // 退出登录
app.get('/logout', function(req, res) {
        // 清除cookie
        res.clearCookie('userCookie', { expires: new Date(Date.now() + 900000), httpOnly: true });
        // 重定向
        res.redirect('/home');
    })
    // 数据加密方法
function mCrypto(str) {
    // 创建哈希对象
    var md5 = crypto.createHash("md5");
    // 用哈希对象加密传入的字符串
    md5.update(str);
    // 将加密后的字符串用十六进制表示
    var hashmsg = md5.digest('hex'); //hashmsg为加密之后的数据
    // 将加密得到的十六进制数据返回
    return hashmsg;
}
// 老用户登录

app.post("/old-user-login", function(req, res) {
    // 创建表单处理对象
    var form = new formidable.IncomingForm();
    // 用他的parse方法解析请求体
    form.parse(req, function(err, fields, files) {
        // 连接到数据库服务器
        MongodbClient.connect(mongoURL, function(err, db) {
            if (err) {
                console.log(err)
            } else {
                // 获取集合对象
                var userCollection = db.collection("user");
                // 查询数据库，看是否存在该用户
                console.log(fields.username, fields.password);
                // 查询看是否与数据库中的数据是否相同，相同就允许登录
                userCollection.find({ username: fields.username, password: mCrypto(fields.password) }).toArray(function(err, docs) {

                    if (err) {
                        console.log(err);
                    } else {
                        console.log(docs);
                        //如果查到用户，表示允许登录
                        if (docs.length >= 1) {
                            // 保存登录状态 用cookie
                            res.cookie('userCookie', fields.username, { expires: new Date(Date.now() + 900000), httpOnly: true });
                            res.send("ok");


                        } else {
                            //不允许登录
                            res.send("no");
                        }
                    }

                });
            }
        })
    })

})
app.get('/check-username', function(req, res) {
    // 连接数据库进行查询
    MongodbClient.connect(mongoURL, function(err, db) {
        var userCollection = db.collection('user');
        userCollection.find({ username: req.query.username }).toArray(function(err, docs) {
            if (err) {
                console.log(err);
            } else {
                if (docs.length > 0) {
                    res.send("yes");
                } else {
                    res.send('no');
                }
            }
        });

    })

});
