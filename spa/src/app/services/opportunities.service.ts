import { HttpClient, HttpErrorResponse, HttpHeaders } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { catchError, Observable, retry, throwError } from 'rxjs';
import { environment } from 'src/environments/environment';
import {Router} from "@angular/router";
import {AuthStorageService} from "./local-storage/auth.service";

@Injectable({
  providedIn: 'root'
})
export class OpportunitiesService {
  headers: any = new HttpHeaders()
    .set('content-type', 'application/json')
    .set('Access-Control-Allow-Origin', '*');
  constructor(
    public http: HttpClient,
    private _route: Router,
    private _authStorageService: AuthStorageService
  ) { }

  index(): Observable<any> {
    return this.http.get<any>(environment.url_base_api + 'opportunity', {
      headers: this.headers
    }).pipe(
      retry(0),
      catchError((error: HttpErrorResponse) => {
        return throwError(error);
      })
    );
  }

  approve(opportunityIdentify: string): Observable<any> {
    return this.http.put<any>(environment.url_base_api + 'opportunity/approve', {
      opportunity_identify : opportunityIdentify
    }, {
      headers: this.headers
    }).pipe(
      retry(0),
      catchError((error: HttpErrorResponse) => {
        return throwError(error);
      })
    );
  }

  reject(opportunityIdentify: string): Observable<any> {
    return this.http.put<any>(environment.url_base_api + 'opportunity/reject', {
      opportunity_identify : opportunityIdentify
    }, {
      headers: this.headers
    }).pipe(
      retry(0),
      catchError((error: HttpErrorResponse) => {
        return throwError(error);
      })
    );
  }

  store(opportunity: any): Observable<any> {
    return this.http.post<any>(environment.url_base_api + 'opportunity', opportunity, {
      headers: this.headers
    }).pipe(
      retry(0),
      catchError((error: HttpErrorResponse) => {
        return throwError(error);
      })
    );
  }
}
