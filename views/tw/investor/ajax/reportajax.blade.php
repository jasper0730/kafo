 @foreach($data as $row)
                <tr data-title="編號" data-id={{$row['id']}} data-total={{$Totaldata}} data-year={{$row['year']}} id="table" data-type={{$typeId}}>
                    <td>{{$row['No']}}</td>
                    <td data-title="標題名稱" class="txtAligt-L">{{$row['title']}}</td>
                    @if(!(empty($row['file'])))
                    <td data-title="詳細資料"><a href="{{$row['file']}}" class="loadFile"></a></td>
                    @else
                    <td data-title="詳細資料"><i class="icon-fin finN"></i></td>
                    @endif
                </tr>
            @endforeach 