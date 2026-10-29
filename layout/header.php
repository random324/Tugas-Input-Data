<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<style>
    *{
        padding: 0;
        margin: 0;
        box-sizing: border-box;
        font-family: Arial, Helvetica, sans-serif;
    }
    nav {
        position: fixed;
        width: 100%;
        height: 50px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 15px;
        border-bottom: 1px solid black;
        z-index: 999;
        top: 0;
        backdrop-filter: blur(20px);
    }
    .brand{
        font-size: 20px;
        font-weight: 600;
        border-bottom: 1px solid black;
    }
    .operator{
        display: flex;
        gap: 10px;
        align-items: center;
    }
    .initial{
        font-size: 20px;
        font-weight: 800;
        width: 34px;
        height: 34px;
        background-color: blue;
        border-radius: 50%;
        display: flex;
        justify-content: center;
        align-items: center;
        color: #ffffff;
        
    }
    .username{
        border-left: 1px solid black;
        padding-left: 10px;
    }
    .username span{
        font-size: 20px;
        font-weight: 500;
    }
    .sidebar{
        position: fixed;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        top: 50px;
        position: fixed;
        background-color: #6b4545;
        width: 250px;
        height: calc(100vh - 40px);
        padding: 30px 20px 20px 10px;

    }
    .sidebar .item, .log{
        display: flex;
        flex-direction: column;
        gap: 10px;
    }
    .sidebar .item a{
        display: flex;
        color: #ffffff;
        text-decoration: none;
        height: 35px;
        width: 220px;
        padding-left: 10px;
        border-radius: 10px;
        align-items: center;
        font-size: 17px;
        font-weight: 550;
        border-bottom: 2px solid #fbfafa00;
        transition: all 0.5s;
        background-color: #fffdfd00;
    }
    .sidebar .item a:hover{
        background-color: #08080826;
        backdrop-filter: blur(15px);
        border-bottom: 2px solid white;
        padding-left: 18px;
    }
    .sidebar .log a{
        text-decoration: none;
        color: #ffffff;
        font-size: 17px;
        font-weight: 500;
    }
    .content{
        margin: 70px 20px 20px 270px;
        min-height: calc(150vh - 70px);
        max-width: 8900px;
        background: #ffffff;
        padding: 30px;
        border-radius: 8px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }
    h2 {
      text-align: center;
      color: #1e293b;
      margin-bottom: 20px;
    }
    .form-group {
      margin-bottom: 15px;
    }
    label {
      display: block;
      font-weight: bold;
      color: #334155;
      margin-bottom: 5px;
      font-size: 14px;
    }
    input, select {
      width: 100%;
      padding: 10px;
      border: 1px solid #cbd5e1;
      border-radius: 6px;
      font-size: 14px;
      box-sizing: border-box;
    }
    input:focus, select:focus {
      outline: none;
      border-color: #3b82f6;
      box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
    }
    .btn-submit {
      width: 100%;
      background-color: #3b82f6;
      color: white;
      padding: 12px;
      border: none;
      border-radius: 6px;
      font-size: 16px;
      font-weight: bold;
      cursor: pointer;
      margin-top: 10px;
      transition: background-color 0.2s;
    }
    .btn-submit:hover {
      background-color: #2563eb;
    }
</style>
<body>
    <!-- Navbar -->
    <nav>
        <div class="brand">
            <span>Data Penduduk</span>
        </div>
        <div class="operator">
            <!-- Huruf pertama dari username -->
            <div class="initial">
                B
            </div>
            <!-- Di isi dengan username -->
            <div class="username">
                <span>Budi Santoso</span>
            </div>
        </div>
    </nav>