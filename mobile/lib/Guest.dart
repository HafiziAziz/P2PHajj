// import 'package:final_fyp_p2p/main.dart';
// import 'package:final_fyp_p2p/main.dart';
import 'package:final_fyp_p2p/main.dart';
import 'package:flutter/material.dart';
import 'package:google_maps_flutter/google_maps_flutter.dart';
// import 'dart:convert';
// import 'src/locations.dart' as locations;

class Guest extends StatefulWidget {
  @override
  Guest({this.username, this.userid, this.longitude, this.latitude});
  
  final String username;
  final String userid;
  final String longitude;
  final String latitude;
  _GuestState createState() => _GuestState();
}

class _GuestState extends State<Guest> {
  Map<MarkerId, Marker> markers = <MarkerId, Marker>{};
  GoogleMapController mapController;

  static var lat = double.parse(latitude);
  static var lng = double.parse(longitude);

  final LatLng _center = LatLng(lat, lng);

  var markerId;

  void _onMapCreated(GoogleMapController controller) {
    setState(() {
      markers.clear();
        final marker = Marker(
          markerId: MarkerId("test"),
          position: _center,
        );
        markers[markerId] = marker;
    });

    mapController = controller;
  }

  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      home: Scaffold(
        appBar: AppBar(
          title: Text('Location Guider'),
          backgroundColor: Colors.green[700],
        ),
        body: GoogleMap(
          onMapCreated: _onMapCreated,
          initialCameraPosition: CameraPosition(
            target: _center,
            zoom: 11.0,
          ),
          markers: markers.values.toSet(),
        ),
      ),
    );
  }
}