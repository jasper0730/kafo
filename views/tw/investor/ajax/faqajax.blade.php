@foreach($data as $row)
                <tr data-title="編號" data-id={{$row['id']}} data-total={{$Totaldata}} id="table">
                    <td>Q{{$row['No']}}</td>
                    <td class="txtAligt-L">{{$row['quest']}}</td>
                </tr>    
                <tr>
                    <td>A{{$row['No']}}</td>
                    <td class="txtAligt-L">{{$row['answer']}}</td>
                </tr>
            @endforeach 