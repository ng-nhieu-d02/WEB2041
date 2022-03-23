<div class="startMain"></div>
<div class="BodyMain">
    <div class="containerProd">
        <div class="containerDm">
            <h2>THÊM SẢN PHẨM :</h2>
            <form class="thEmDM">
                <input type="text" id="namesp" placeholder="Nhập tên sản phẩm">
                <input type="text" id="price" placeholder="Nhập giá sản phẩm">
                <input type="text" id="detail" placeholder="Nhập mô tả sản phẩm">
                <input type="text" id="cat_id" placeholder="Nhập danh mục sản phẩm">
                <input type="text" id="img" placeholder="Nhập ảnh sản phẩm">
                <button id="luuSp">Lưu</button>
            </form>
        </div>
        <div class="containerPrd">
            <h2>SẢN PHẨM :</h2>
            <div class="contentSp">
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        document.querySelector('#luuSp').onclick = (e) => {
        e.preventDefault();
        url = 'http://localhost:3000/products'
        sp = {
            img: document.getElementById('img').value.trim(),
            name: document.getElementById('namesp').value.trim(),
            price: document.getElementById('price').value.trim(),
            detail: document.getElementById('detail').value.trim(),
            cat_id: document.getElementById('cat_id').value.trim()
        }
        options = {
            method: "POST",
            body: JSON.stringify(sp),
            headers: {
                'Content-type': 'application/json'
            }
        }
        fetch(url, options)
            .then(res => res.json())
            .then(data => {
                alert('Đã Thêm');
                fetchData();
                document.getElementById('img').value="";
                document.getElementById('namesp').value="";
                document.getElementById('price').value="";
                document.getElementById('detail').value="";
                document.getElementById('cat_id').value="";
            })
        }

        fetchData();

        function fetchData() {
            fetch('http://localhost:3000/products')
                .then(function(res) {
                    if (!res.ok) throw Error("loi: " + res.statusText);
                    return res.json();
                })
                .then(function(data) {
                    str = "";
                    for (i in data) {
                        str += `
                                    <form class="contentPrdJs" method="post">
                                        <input type="tel" name="checkIDSp" readonly id="inputIdSp1" value="${data[i].id}">
                                        <input type="tel" name="checkIDDmSp" id="inputIdDm1" value="${data[i].cat_id}">
                                        <input type="tel" name="checkNameSp" id="inputNameSp1" value="${data[i].name}">
                                        <input type="tel" name="checkPriceSp" id="inputPriceSp1" value="${data[i].price}">
                                        <input type="image" src="${data[i].image}" id="imagesAdm" alt="" readonly>
                                        <input type="tel" name="checkChiTSp" id="inputChiTietSp" value="${data[i].detail}">
                                        <div class="action">
                                            <button class="SuaSpam" id="${data[i].id}" name="btn-SuaSpam" readonly value="Sửa">Sửa</button>
                                            <button class="XoaSpam" id="${data[i].id}" name="btn-XoaSpam" readonly value="Xoá">Xoá</button>
                                        </div>
                                    </form>
                                `;
                    }
                    document.querySelector('.contentSp').innerHTML = str;
                })
                .catch(function(err) {
                    console.log(err);
                })
        }

        $(document).on('click','.SuaSpam',function(e){
            e.preventDefault();
            var parentSp = $(this).parents('.contentPrdJs');
            let id = parentSp.find('#inputIdSp1').val();
            let dm = parentSp.find('#inputIdDm1').val();
            let name = parentSp.find('#inputNameSp1').val();
            let gia = parentSp.find('#inputPriceSp1').val();
            let img = parentSp.find('#imagesAdm').attr('src');
            let detail = parentSp.find('#inputChiTietSp').val();
            const question = confirm("bạn có chắc muốn lưu thay đổi này !!");
            if(question == false) {
                fetchData(); 
                return;
            }
            url = `http://localhost:3000/products/${id}`
            sp = {
                image: img.trim(),
                name: name.trim(),
                price: gia.trim(),
                detail: detail.trim(),
                cat_id: dm.trim()
            }
            options = {
                method: "PUT",
                body: JSON.stringify(sp),
                headers: {
                    'Content-type': 'application/json'
                }
            }
            fetch(url, options)
            .then(res => res.json())
            .then(data => {
                alert('Đã Sửa');
                fetchData();
            })
        })

        $(document).on('click','.XoaSpam',function(e){
            e.preventDefault();
            id = $(this).attr('id');
            const question = confirm("bạn có chắc muốn xoá sản phẩm này !!");
            if(question == false) return;
            fetch(`http://localhost:3000/products/${id}`,{method:"delete"})
            .then(res => res.json())
            .then( data => {
                alert("Đã xoá");
                fetchData();
            })
        })
        
    })
    
</script>
<div class="endMain"></div>