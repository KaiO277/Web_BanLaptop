<h2>Chào {{ $c_name }},</h2>
<h4><b>Bạn đã đặt hàng thành công</b></h4>
<h4>Vui lòng check thông tin</h4>
<p>Tên: {{ $cus->cus_name }}</p>
<p>Ngày đặt: {{ $cus->OrderTime }}</p>
<p>Số điện thoại: {{ $cus->sdt }}</p>
<p>Email: {{ $cus->email }}</p>
<p>Địa chỉ: {{ $cus->address }}</p>
<h4>Chi tiết sản phẩm</h4>
<table border="1" cellspacing="0" cellpadding="10" width="400">
    <thead>
      <tr>
        <th>STT</th>
        <th>Tên Sản Phẩm</th>
        <th>Số lượng</th>
      </tr>
    </thead>
    <tbody>
        <?php $n=1; ?>
      @foreach ($items as $order)
      <tr>
        <td>{{ $n }}</td>
        <td>{{ $order->prod_name }}</td>
        <td>{{ $order->quantity }}</td>
      </tr>
      <?php $n++; ?>
      @endforeach                  
    </tbody>
  </table>
<h4>Cảm ơn bạn đã mua hàng tại website chúng tôi.</h4>