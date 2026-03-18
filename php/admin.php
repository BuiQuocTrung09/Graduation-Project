<!doctype html>
<html lang="vi">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Quản lý - Admin Chill Coffee</title>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&display=swap" rel="stylesheet" />
  <style>
    body {
      margin: 0;
      font-family: "Montserrat", sans-serif;
      background: #f5f4f0;
      color: #332c2b;
    }
    .admin-header {
      background: #6f4e37;
      color: #fff;
      padding: 25px 20px 15px 20px;
      text-align: center;
      font-size: 2rem;
      letter-spacing: 2px;
    }
    .admin-wrapper {
      max-width: 1100px;
      margin: 32px auto;
      background: #fff;
      border-radius: 23px;
      box-shadow: 0 8px 44px rgba(71, 47, 27, 0.09);
      padding: 24px 14px 40px 14px;
    }
    .admin-tabs {
      display: flex;
      gap: 6px;
      margin-bottom: 28px;
      border-bottom: 2px solid #eee;
      flex-wrap: wrap;
    }
    .admin-tab {
      padding: 11px 28px;
      background: #ebe5dd;
      color: #323232;
      font-weight: 600;
      cursor: pointer;
      border: none;
      border-radius: 11px 11px 0 0;
      font-size: 18px;
      margin-bottom: -2px;
      transition: background 0.15s, color 0.2s;
    }
    .admin-tab.active {
      background: #ffffff;
      color: #6f4e37;
      border-bottom: 2px solid #f5f4f0;
    }
    .tab-content {
      display: none;
      margin-top: 16px;
    }
    .tab-content.active {
      display: block;
      animation: fadeInTab .2s;
    }
    @keyframes fadeInTab { from { opacity:0; } to { opacity:1; } }
    .toolbar {
      display: flex;
      justify-content: space-between;
      align-items: center;
      gap: 15px;
      margin-bottom: 17px;
      flex-wrap: wrap;
    }
    .toolbar .search-box {
      position: relative;
    }
    .toolbar input[type="search"] {
      border-radius: 8px;
      border: 1.5px solid #e0ccb3;
      padding: 8px 34px 8px 12px;
      font-size: 15px;
    }
    .toolbar .search-box:before {
      content: "🔍";
      position: absolute;
      right: 10px; top: 50%;
      transform: translateY(-50%);
      font-size: 16px;
      color: #c8a78c;
      opacity: 0.7;
    }
    .add-btn {
      background: #6f4e37;
      color: #fff;
      border: none;
      padding: 10px 21px;
      border-radius: 8px;
      font-weight: bold;
      font-size: 15px;
      cursor: pointer;
      transition: background 0.25s;
    }
    .add-btn:hover {
      background: #29231d;
    }
    /* Table style */
    .admin-table {
      width: 100%;
      border-collapse: collapse;
      background: #fff;
      border-radius: 10px;
      overflow: hidden;
      font-size: 1rem;
      box-shadow: 0 4px 20px rgba(151,131,108,.06);
    }
    .admin-table th, .admin-table td {
      padding: 15px 8px;
      border-bottom: 1.3px solid #f1ede8;
      text-align: left;
    }
    .admin-table th {
      background: #fcf7f2;
      color: #6f4e37;
      text-transform: capitalize;
      letter-spacing: 0.5px;
      font-size: 1.025rem;
    }
    .admin-table tr:last-child td {
      border-bottom: none;
    }
    .action-btn {
      border: none;
      border-radius: 6px;
      padding: 6px 13px;
      margin-right: 4px;
      font-weight: 600;
      cursor: pointer;
      font-size: 13px;
      transition: background 0.14s;
    }
    .action-btn.edit { background: #d8bb97; color: #473129;}
    .action-btn.delete { background: #d9613a; color: #fff;}
    .action-btn.edit:hover { background: #ebd7c0;}
    .action-btn.delete:hover { background: #ac3c15;}
    /* Responsive */
    @media (max-width: 900px){
      .admin-table, .admin-table thead, .admin-table tbody, .admin-table th, .admin-table td, .admin-table tr {
        display: block;
        width: 100%;
      }
      .admin-table thead { display: none; }
      .admin-table tr { margin-bottom: 18px; }
      .admin-table td {
        padding: 12px;
        border-bottom: 1px solid #f3efec;
        position: relative;
        text-align: left;
      }
      .admin-table td:before {
        content: attr(data-label);
        font-weight: 600;
        color: #a28674;
        display: block;
        margin-bottom: 3px;
      }
    }
    @media (max-width: 600px){
      .admin-wrapper { padding: 10px 2vw 35px 2vw;}
      .toolbar { flex-direction: column; align-items: flex-start; }
      .add-btn { width: 100%; }
      .admin-header { font-size: 1.3rem; padding: 18px 3vw;}
    }
  </style>
</head>
<body>
  <div class="admin-header">☕ Quản trị hệ thống Chill Coffee</div>
  <div class="admin-wrapper">
    <div class="admin-tabs">
      <button class="admin-tab active" data-tab="customers">Khách hàng</button>
      <button class="admin-tab" data-tab="products">Sản phẩm</button>
      <button class="admin-tab" data-tab="employees">Nhân viên</button>
    </div>
    <div class="tab-content active" id="tab-customers">
      <div class="toolbar">
        <div class="search-box">
          <input type="search" placeholder="Tìm khách hàng..." id="search-customer"/>
        </div>
        <button class="add-btn">+ Thêm khách hàng</button>
      </div>
      <table class="admin-table">
        <thead>
          <tr>
            <th>#</th>
            <th>Tên</th>
            <th>Email</th>
            <th>Số điện thoại</th>
            <th>Thao tác</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td data-label="#">1</td>
            <td data-label="Tên">Nguyễn Văn A</td>
            <td data-label="Email">vana@gmail.com</td>
            <td data-label="SĐT">0912123456</td>
            <td data-label="Thao tác">
              <button class="action-btn edit">Sửa</button>
              <button class="action-btn delete">Xóa</button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
    <div class="tab-content" id="tab-products">
      <div class="toolbar">
        <div class="search-box">
          <input type="search" placeholder="Tìm sản phẩm..." id="search-product"/>
        </div>
        <button class="add-btn">+ Thêm sản phẩm</button>
      </div>
      <table class="admin-table">
        <thead>
          <tr>
            <th>#</th>
            <th>Tên sản phẩm</th>
            <th>Giá</th>
            <th>Hình ảnh</th>
            <th>Thao tác</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td data-label="#">1</td>
            <td data-label="Tên">Bạc Xỉu</td>
            <td data-label="Giá">28.000₫</td>
            <td data-label="Ảnh"><img src="picture/bacxiu.png" alt="Bạc xỉu" style="width:38px;height:38px;border-radius:8px;object-fit:cover"/></td>
            <td data-label="Thao tác">
              <button class="action-btn edit">Sửa</button>
              <button class="action-btn delete">Xóa</button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
    <div class="tab-content" id="tab-employees">
      <div class="toolbar">
        <div class="search-box">
          <input type="search" placeholder="Tìm nhân viên..." id="search-employee"/>
        </div>
        <button class="add-btn">+ Thêm nhân viên</button>
      </div>
      <table class="admin-table">
        <thead>
          <tr>
            <th>#</th>
            <th>Tên nhân viên</th>
            <th>Email</th>
            <th>Chức vụ</th>
            <th>Thao tác</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td data-label="#">1</td>
            <td data-label="Tên">Trần Thị B</td>
            <td data-label="Email">tranb@chillcoffee.vn</td>
            <td data-label="Chức vụ">Thu ngân</td>
            <td data-label="Thao tác">
              <button class="action-btn edit">Sửa</button>
              <button class="action-btn delete">Xóa</button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
  <script>
    const tabs = document.querySelectorAll('.admin-tab');
    const contents = document.querySelectorAll('.tab-content');
    tabs.forEach(tab => {
      tab.onclick = function () {
        tabs.forEach(t => t.classList.remove('active'));
        contents.forEach(c => c.classList.remove('active'));
        tab.classList.add('active');
        document.getElementById('tab-' + tab.dataset.tab).classList.add('active');
      }
    });
    // Optionally: Fillter/search ở frontend (fake)
    document.getElementById('search-customer').addEventListener('input', function(){
      filterTable(this.value, "tab-customers");
    });
    document.getElementById('search-product').addEventListener('input', function(){
      filterTable(this.value, "tab-products");
    });
    document.getElementById('search-employee').addEventListener('input', function(){
      filterTable(this.value, "tab-employees");
    });
    function filterTable(value, tabId){
      value = value.toLowerCase();
      const trs = document.querySelectorAll(`#${tabId} tbody tr`);
      trs.forEach(tr=>{
        tr.style.display = Array.from(tr.children).some(td=>td.textContent.toLowerCase().includes(value))?"":"none";
      });
    }
  </script>
</body>
</html>