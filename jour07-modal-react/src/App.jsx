import Button from "./components/Button" ;
import Modal from "./components/Modal";
import {useState , useEffect} from "react"

function App(){
  const [show, setShow] = useState(false);
  const [comments, setComments] = useState([]);

  useEffect(()=>{
    fetch("http://192.168.33.10/api/index.php?id=1")
      .then(function(response){return response.json()})
      .then(function(data){
        setComments(data);
       
      })
  }, [])

  return <div>
      <Button setShow={setShow}/>
      <Modal  show={show}  setShow={setShow}/>
      <ul>
        {comments.map(function(comment ){
          return <li key={comment.id}>{comment.email} <br />{comment.message}</li>
        })}
      </ul>
      
  </div>
}

export default App ;