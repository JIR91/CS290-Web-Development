class LoginForm extends React.Component{
    constructor(props){
        super(props);
        this.state = {
            user: '',
            password: ''
        };
        this.update_user = this.update_user.bind(this);
        this.update_password = this.update_password.bind(this);
        this.handleLogIn = this.handleLogIn.bind(this);
        this.handleNewAccount = this.handleNewAccount.bind(this);
    }
    update_user(event){
        this.setState({user: event.target.value})    // passswrd: event.target.passswrd
        console.log(this.state.user)
    }
    update_password(event){
        this.setState({password: event.target.value})
        console.log(this.state.password)
    }
    handleLogIn(event){
        event.preventDefault();
        console.log('login btn pressed')
        alert('login btn pressed')
    }
    handleNewAccount(event){
        window.location.href='page/login.html';
    }
    render(){
        return(
            <>
            <form onSubmit={this.handleLogIn}>
                <input type="text" name='name' placeholder="Username" value={this.state.user} onChange={this.update_user}/>
                <input type='password' password='password' placeholder="Password" value={this.state.password} onChange={this.update_password}/>
                <input type="submit" value="Login"/>
                <input type="button" value="Create Account" onClick={this.handleNewAccount}/>
            </form>
            </>
        )
    }
}

const newForm = ReactDOM.createRoot(document.getElementById('react_form'));
newForm.render(<LoginForm/>)