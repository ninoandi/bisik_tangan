import 'dart:convert';
import 'package:http/http.dart' as http;

class AuthService {
  final String baseUrl =
      "http://localhost/bisik_tangan/api"; // Use 10.0.2.2 for emulator in Android

  // Function to send API requests
  Future<Map<String, dynamic>> sendRequest(
      String endpoint, Map<String, String> body) async {
    final String apiUrl = "$baseUrl/$endpoint";

    try {
      var response = await http.post(
        Uri.parse(apiUrl),
        headers: {"Content-Type": "application/x-www-form-urlencoded"},
        body: body,
      );

      if (response.statusCode == 200) {
        if (response.body.isNotEmpty) {
          return json.decode(response.body);
        } else {
          return {"status": "error", "message": "Response format is empty"};
        }
      } else {
        return {"status": "error", "message": "Failed: ${response.statusCode}"};
      }
    } catch (e) {
      return {"status": "error", "message": "An error occurred: $e"};
    }
  }

  // Login User
  Future<Map<String, dynamic>> loginUser(String email, String password) async {
    return await sendRequest("login.php", {
      "email": email,
      "password": password,
    });
  }

  // Register User
  Future<Map<String, dynamic>> registerUser(
      String email, String username, String password) async {
    return await sendRequest("register.php", {
      "email": email,
      "username": username,
      "password": password,
    });
  }
}
