<table class="tableRWD tb_style1 tb_style3">
            <thead>
                <tr>
                    <th class="deeBlueTit">
                        <span>年度</span>
                    </th>
                    <th>
                        <span>股東會日期</span>
                    </th>
                    <th>
                        <span>普通股每股股利股票</span>
                        <span>股利</span><small class="unit">( 新台幣 )</small>
                    </th>
                    <th>
                        <span>普通股每股股利現金</span>
                        <span>股利</span><small class="unit">( 新台幣 )</small>
                    </th>
                    <th><span>除權息交易日</span></th>
                    <th><span>基準日</span></th>
                    <th><span>發放日</span></th>
                </tr>
            </thead>
            <tbody id="dividendtable">
                @foreach($dividends as $row)
                <tr id="dividendtable" data-total = {{$Totaldividends}} data-year = {{$row['year']}} data-id = {{$row['id']}}>
                    <td data-title="年度">{{$row['year']}}</td>
                    <td data-title="股東會日期">{{$row['shareholder']}}</td>
                    <td data-title="普通股每股股利股票">{{$row['stock']}}</td>
                    <td data-title="普通股每股股利現金">{{$row['cash']}}</td>
                    <td data-title="除權息交易日">{{$row['dr']}}</td>
                    <td data-title="基準日">{{$row['reference']}}</td>
                    <td data-title="發放日">{{$row['payment']}}</td>
                </tr> 
                @endforeach                                               
            </tbody>
        </table>
