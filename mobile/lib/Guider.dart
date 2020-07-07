import 'package:final_fyp_p2p/main.dart';
import 'package:flutter/material.dart';
import 'package:geolocator/geolocator.dart';
import 'package:http/http.dart' as http;

class Guider extends StatefulWidget {
  @override
  Guider({this.username, this.userid});
  
  final String username;
  final String userid;

  _GuiderState createState() => _GuiderState();
}

class _GuiderState extends State<Guider> {
  Position _currentPosition;

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(title: Text("Guider - $username"),),
      body: Center(
        child: Column(
          mainAxisAlignment: MainAxisAlignment.center,
          children: <Widget>[
            if (_currentPosition != null)
              Text("LAT: ${_currentPosition.latitude}, LNG: ${_currentPosition.longitude}"),
            RaisedButton(
              child: Text("Update location"),
              onPressed: () {
                _getCurrentLocation();
              },
            ),

            RaisedButton(
              child: Text("Log Out"),
              onPressed: (){
                Navigator.pushReplacementNamed(context,'/MyHomePage');
              },
            ),
          ],
        ),
      ),
    );
  }
  _getCurrentLocation() async {
    final Geolocator geolocator = Geolocator()..forceAndroidLocationManager;
    geolocator
        .getCurrentPosition(desiredAccuracy: LocationAccuracy.best)
        .then((Position position) {
      setState(() {
        _currentPosition = position;
        String lat = _currentPosition.latitude.toStringAsFixed(8);
        String long = _currentPosition.longitude.toStringAsFixed(8);
        var url = 'http://joyahggez.ddns.net:8809/web/p2phajj/API/update_location.php';
        http.post(url, body: {
                                'id': userid,      
                                'username': username,
                                'latitude': lat, 
                                'longitude': long,
                        }
                  );
      });
    }).catchError((e) {
      print(e);
    });
  }
}