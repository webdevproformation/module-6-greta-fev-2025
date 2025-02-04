import Button from "./components/Button" ;
import Modal from "./components/Modal";
import {useState} from "react"

function App(){
  const [show, setShow] = useState(false);

  function toggle(){
      setShow(function(prevState){
          return !prevState; 
      })
  }

  return <div>
      <Button toggle={toggle}/>
      <Modal  show={show}  toggle={toggle}/>
  </div>
}

export default App ;