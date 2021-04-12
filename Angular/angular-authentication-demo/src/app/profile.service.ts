import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import config from './config';
import { Profile } from './profile/profile';

@Injectable({
  providedIn: 'root'
})
export class ProfileService {

  constructor(private http: HttpClient) {}

  getProfile() {
    // now returns an Observable of Config
    return this.http.get<Profile>(
      `https://api.loginradius.com/identity/v2/auth/account?access_token=${localStorage.getItem(
        'token'
      )}&apikey=${config.API_KEY}`
    );
  }
}
