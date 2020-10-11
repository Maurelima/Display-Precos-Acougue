<?php if(!class_exists('Rain\Tpl')){exit;}?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/res/acougue/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:300,400,700">
    <link rel="stylesheet" href="/res/acougue/assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/pikaday/1.6.1/css/pikaday.min.css">
</head>
<body style="margin: 0px !important;">
    
    <style>
      @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@700&display=swap');
      body{
        background-image: url('/res/site/img/4.jpg');
        /*background-position: center;*/
        background-repeat: no-repeat;
        background-size: cover;
      }
        #products td{
            font-size: 23px ;
            font-weight: bolder;
            font-family: 'Poppins', sans-serif;
            color: #FFF;
        }
        #products .price{
           background-color: rgba(0, 0, 0, 0.7) !important;
           text-align:center;
           color: #FFF;
        }
        #products th{
          font-family: 'Poppins', sans-serif;
          
        }
    </style>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-6">
            <table class="table table-borderless" id="products" style="margin-top: 200px;border-collapse:separate; 
            border-spacing:10px 15px;background-color: rgba(0, 0, 0, 0.5);border-radius: 5px;">
                <thead >
                  <tr style="line-height: 20px;">
                    <th scope="col" style="width: 90%;font-size: 23px;background-color: rgba(0, 0, 0, 0.7) !important;color:rgb(255, 196, 86);">Costela KG</th>
                    <th scope="col" style="font-size: 25px;background-color: rgba(0, 0, 0, 0.7) !important;color:rgb(255, 255, 255);text-align:center;">23.90</th>
                  </tr>
                </thead>
                <tbody>
                    
                  <tr style="line-height: 20px;"> 
                    <td>Contra Filé</td>
                    <td class="price">12.90</td>
                  </tr>
                  <tr style="line-height: 20px;">
                    <td>Coxão Duro</td>
                    <td class="price">24.50</td>
                  </tr>
                  <tr style="line-height: 20px;">
                    <td>Coxão Mole</td>
                    <td class="price">45.60</td>
                  </tr>
                  <tr style="line-height: 20px;"> 
                    <td>Alcatra</td>
                    <td class="price">10.80</td>
                  </tr>
                  <tr style="line-height: 20px;">
                    <td>Fraldinha</td>
                    <td class="price">15.95</td>
                  </tr>
                  <tr style="line-height: 20px;">
                    <td>Músculo</td>
                    <td class="price">22.40</td>
                  </tr>
                  <tr style="line-height: 20px;"> 
                    <td>Lagarto</td>
                    <td class="price">17.79</td>
                  </tr>
                  <tr style="line-height: 20px;">
                    <td>Costela</td>
                    <td class="price">99.99</td>
                  </tr>
                  <tr style="line-height: 20px;">
                    <td>Maçã de peito</td>
                    <td class="price">150.49</td>
                  </tr>                

                </tbody>
              </table>
            
        </div>
        <style>
          .card-title{
            font-size: 70px;
            font-family: 'Poppins', sans-serif;
            color: rgb(228, 123, 48);
            text-align: center;
            text-shadow: 2px 2px 4px #000000;
          }
          .card-price{
            font-size: 70px;
            font-family: 'Poppins', sans-serif;
            color: rgb(228, 123, 48);
            text-align: center;
            text-shadow: 2px 2px 4px #000000;
          }
          .card-body img{
            height: 50%;
            width: 50%;
            margin-left: auto;
            margin-right: auto;
            display: block;
          }
          .card{
            border-image: url('/res/site/img/table.jpg') 27 23 / 10px 10px  round ;
          }
        </style>
        <div class="col-md-6" >
          <div class="card" style="width: 100%;margin-top: 200px;">
            <div class="card-body">
              <h5 class="card-title">Costela Bovina</h5><hr>
              <img class="card-img-top"  src="/res/site/img/costela.png">
              <h5 class="card-price">R$ 29.50</h5>
            </div>
          </div>
        </div>
    </div>
</div>