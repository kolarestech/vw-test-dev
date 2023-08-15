import { Injectable } from '@angular/core';
import {HttpRequest, HttpHandler, HttpEvent, HttpInterceptor, HttpErrorResponse} from '@angular/common/http';
import {catchError, Observable, throwError} from 'rxjs';
import {AuthService} from "./auth.service";
import {ToastrService} from "ngx-toastr";

@Injectable()
export class JwtInterceptor implements HttpInterceptor {
  constructor(
    private _authService : AuthService,
    private _toastService : ToastrService
  ) { }

  intercept(request: HttpRequest<any>, next: HttpHandler): Observable<HttpEvent<any>> {
    // add auth header with jwt if account is logged in and request is to the api url
    const token = this._authService.getLoggedToken();
    //const isApiUrl = request.url.startsWith(environment.apiUrl);
    //if (isLoggedIn && isApiUrl) {
      request = request.clone({
        setHeaders: { Authorization: `Bearer ${token}` }
      });
    //}

    return next.handle(request).pipe(
      catchError((error: HttpErrorResponse) => {
        let errorMsg = '';
        if (error.error instanceof ErrorEvent) {
          console.log('This is client side error');
          errorMsg = `Error: ${error.error.message}`;
        } else {
          if(error.status == 422) {
            this._toastService.error(error.error.message)
          }
        }

        return throwError(errorMsg);
      })
    );
  }
}
