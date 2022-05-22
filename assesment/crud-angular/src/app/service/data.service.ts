import { Injectable } from '@angular/core';
//Import HTTP CLien as this will be used to fetch data from your API And display
import {HttpClient} from '@angular/common/http';
import { Student } from '../student';
@Injectable({
  providedIn: 'root'
})
export class DataService {

  //Add the HTTP CLien in constructor
  constructor(private httpClient:HttpClient) { }


  //Function Fetches Data from API Endpoint
  getData(){
    return this.httpClient.get('http://127.0.0.1:8000/api/students');

  }

  insertData(data: Student){
    return this.httpClient.post('http://127.0.0.1:8000/api/students',data);

  }

  deleteData(id: string){
    return this.httpClient.delete('http://127.0.0.1:8000/api/students/'+id);

  }

 //Getting Student Data Based On Id
 getEmployeeById(id: string | undefined){
  return this.httpClient.get('http://127.0.0.1:8000/api/students/'+id);
 }

 updateData(id: string, data: Student){
  return this.httpClient.put('http://127.0.0.1:8000/api/students/'+id,data);

}

}
