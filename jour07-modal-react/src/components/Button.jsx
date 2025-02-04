function Button({setShow})
{
    return <button id="btn" onClick={() => setShow(function(show){
        return !show 
    })}>open modal</button>
}

export default Button ; 