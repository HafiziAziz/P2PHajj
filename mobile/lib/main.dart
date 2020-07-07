import 'dart:async';
import 'dart:convert';
import 'package:flutter/material.dart';
import 'package:http/http.dart' as http;
import 'package:final_fyp_p2p/Guest.dart';
import 'package:final_fyp_p2p/Guider.dart';

// void main() => runApp(MyApp());
void main() => runApp(new MyApp());

String username='';
String userid='';
String longitude;
String latitude;
class MyApp extends StatelessWidget {
  
  @override
  Widget build(BuildContext context) {
    return new MaterialApp(
      debugShowCheckedModeBanner: false,
      title: 'P2P Hajj',     
      home: new MyHomePage(),
      routes: <String,WidgetBuilder>{
        '/MyHomePage': (BuildContext context)=> new MyHomePage(),
        '/Guest': (BuildContext context)=> new Guest(username: username,  userid: userid, longitude: longitude, latitude:latitude),
        '/Guider': (BuildContext context)=> new Guider(username: username, userid: userid,),
      },
    );
  }
}

class MyHomePage extends StatefulWidget {
  @override
  _MyHomePageState createState() => _MyHomePageState();
}

class _MyHomePageState extends State<MyHomePage> {

TextEditingController user=new TextEditingController();
TextEditingController pass=new TextEditingController();

String msg='';

// Future<List> _login() async {
Future<Map<String,dynamic>> _login() async {
  final response = await http.post("http://joyahggez.ddns.net:8809/web/p2phajj/API/mobile_login.php", body: {
    "username": user.text,
    "password": pass.text,
  });

  var datauser = json.decode(response.body);
    print(datauser);
  // exit(0);
  if ( datauser.length == 0 ) {
    setState(() {
      msg="Invalid User";
    });
  } else {
      if (datauser['level'] == 'guest') { 
        Navigator.pushReplacementNamed(context, '/Guest');
      }
      if (datauser['level'] == 'guider') { 
        Navigator.pushReplacementNamed(context, '/Guider');
      }
    setState(() {
          username= datauser['username'];
          userid= datauser['id'];
          longitude= datauser['longitude'];
          latitude= datauser['latitude'];
        });
  }
  return datauser;
}

// View
  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(title: Text("P2P Hajj - Login"), centerTitle: true,),
      body: Container(
        child: Center(
          child: Column(
            children: <Widget>[
              Padding(
                padding: const EdgeInsets.all(8.0),
                child: Text("Username",style: TextStyle(fontSize: 18.0),),
              ),
              TextField(   
                controller: user,
                decoration: InputDecoration(
                  hintText: ' Username'
                ),           
                ),
              Padding(
                padding: const EdgeInsets.all(8.0),
                child: Text("Password",style: TextStyle(fontSize: 18.0),),
              ),
              TextField(  
                controller: pass,
                obscureText: true,                
                 decoration: InputDecoration(
                  hintText: ' Password'
                ),                
                ),
              
              Text(msg,style: TextStyle(fontSize: 20.0,color: Colors.red),),

              RaisedButton(
                child: Text("Login"),
                onPressed: (){
                  _login();
                },
              )
            ],
          ),
        ),
      ),
    );
}
}