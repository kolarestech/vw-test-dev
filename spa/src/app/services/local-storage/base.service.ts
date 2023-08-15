import { Injectable } from '@angular/core';


@Injectable({
  providedIn: 'root'
})
export class BaseService {
  constructor() {

  }

  getObject(key : any) : any {
    let data = window.localStorage.getItem(key);

    if(data == null) {
      return false;
    }

    return JSON.parse(data);
  }

  getString(key : any) {
    let data = window.localStorage.getItem(key);

    if(data == null) {
      return false;
    }

    return data;
  }

  setObject(key: any, data: any) : any {
    window.localStorage.setItem(key, JSON.stringify(data));

    return this.getObject(key);
  }

  setString(key: any, data: any) : any {
    window.localStorage.setItem(key, data);

    return this.getString(key);
  }

  delete(key : any) {
    if(window.localStorage.getItem(key)) {
      window.localStorage.removeItem(key);
      return true;
    }
    return false
  }
}
