import { Component } from '@angular/core';
import * as yolo from '@angular/router'
@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css']
})
export class AppComponent {
  title = 'app works!';
  Connection():void{
    var connection = mysql.createConnection({
      host     : 'localhost',
      user     : 'root',
      password : '',
      database : 'my-planif'
    });

    connection.connect();

    console.log("connecté");

    connection.end();
  }
}
