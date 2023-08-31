<a href="https://instagram.com/traf" target="_blank" class="button">
<rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg>
  <span  class="button-text">
  Generar PDF
  </span>
</a>







 <style>



.button {
    
  transition: all .2s ease-in-out;
  -webkit-appearance: none;
  letter-spacing: -0.5px;
  text-decoration: none;
  border-radius: 100px;
  font-family: inherit;
  align-items: center;
  position: relative;

  font-weight: 500;
  text-align: left;
  background: #06f;
  appearance: none;
  font-size: 20px;
  cursor: pointer;
  display: flex;
  outline: none;
  border: none;
  color: #fff;
  top: -125px;
  left: 20%;
  width: 150px;
  height: 50px;
}



.button-text {
  flex-direction: column;
  font-size: 16px;
  display: flex;
  position: relative;
  left: -20px;
}

.button-numbers {
  margin-top: 4px;
  font-size: 12px;
  opacity: 0.6;
}

.button:hover { transform: translateY(-2px); }
.button:active { transform: translateY(0); }

.button:before {
  animation: pulse 2s ease infinite;
  border-radius: 100px;
  position: absolute;
  background: #06f;
  content: "";
  z-index: -1;
  bottom: 0;
  right: 0;
  left: 0;
  top: 0;
}

@keyframes pulse {
  0% { transform: scale(1); }
  50% { opacity: 0.2; }
  100% { transform: scale(1.2, 1.4); opacity: 0; }
}

.background {
  pointer-events: none;
  overflow: hidden;
  position: fixed;
  height: 100vh;
  opacity: 0.3;
  border: none;
  z-index: -1;
  width: 100%;
  left: 0;
  top: 0;
}
   </style>