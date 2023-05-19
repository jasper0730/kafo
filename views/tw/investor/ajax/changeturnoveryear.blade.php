<table class="tableRWD tb_style1">
            <thead>
                <tr>
                    <th class="deeBlueTit" width="25%">月份</th>
                    <th width="25%"><span>{{$twyear-1}}年度合併營收金額</span><small class="unit">( 單位：新台幣仟元 )</small></th>
                    <th width="25%"><span>{{$twyear}}年度合併營收金額</span><small class="unit">( 單位：新台幣仟元 )</small></th>
                    <th width="25%"><span>合併營收 - 年度增( 減 )比率</span></th>
                </tr>
            </thead>
            <tbody>
            @foreach($data as $row)
                <tr>
                    <td data-title="月份">{{$row['month']}}</td>
                    <td data-title="104年度合併營收金額">{{$row['amount1']}}</td>
                    <td data-title="104年度合併營收金額">{{$row['amount2']}}</td>
                    <td data-title="合併營收 - 年度增( 減 )比率">{{$row['ratio']}}</td>
                </tr>
            @endforeach                                                                                               
                <tr class="grandTotal">
                    <td data-title="本月累計">年累計</td>
                    <td data-title="104年度合併營收金額">{{$Totalamount}}</td>
                    <td data-title="104年度合併營收金額">{{$Totalamount2}}</td>
                    <td data-title="合併營收 - 年度增( 減 )比率">{{$Totalratio}}</td>
                </tr>                                                                                            
            </tbody>
        </table>