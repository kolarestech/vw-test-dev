import { HttpClient, HttpErrorResponse, HttpHeaders } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { catchError, Observable, retry, throwError } from 'rxjs';
import { environment } from 'src/environments/environment';
import {Router} from "@angular/router";
import {AuthStorageService} from "./local-storage/auth.service";

@Injectable({
  providedIn: 'root'
})
export class AuthService {
  headers: any = new HttpHeaders()
    .set('content-type', 'application/json')
    .set('Access-Control-Allow-Origin', '*');
  constructor(
    public http: HttpClient,
    private _route: Router,
    private _authStorageService: AuthStorageService
  ) { }

  login(email: any, password: any): Observable<any> {
    return this.http.post<any>(environment.url_base_api + 'auth/login', {
      email: email,
      password: password,
      device_name: "client_app",
    }, {
      headers: this.headers
    }).pipe(
      retry(0),
      catchError((error: HttpErrorResponse) => {
        return throwError(error);
      })
    );
  }

  register(user: any): Observable<any> {
    return this.http.post<any>(environment.url_base_api + 'auth/signup', user, {
      headers: this.headers
    }).pipe(
      retry(0),
      catchError((error: HttpErrorResponse) => {
        return throwError(error);
      })
    );
  }

  logout() {
    this._authStorageService.logout();
  }

  getLoggedUser() {
    return this._authStorageService.getLoggedUser();
  }

  getLoggedToken() {
    return this._authStorageService.getToken();
  }
}
