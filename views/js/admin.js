;

((d)=>{
    const id = document.getElementById.bind(document)
    const q = document.querySelector.bind(document)
    const all = document.querySelectorAll.bind(document)
    d.addEventListener('DOMContentLoaded', e =>{
        let inputitle = id('title');
        inputitle.addEventListener('change', () => {
            let data = new FormData();
            data.append('SameTitle', inputitle.value);
            console.log(data.get('SameTitle'));
            fetch('index.php',{
                method: 'post',
                body: data,
                credentials: 'include'
            })
            .then( response => {
                return response.json;
            })
            .then( datos => {
                console.log(datos);
            }).catch( error => {
                console.log(error);
            })
        });
    })
})(document);