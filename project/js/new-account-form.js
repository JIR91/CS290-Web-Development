const { useState } = React;

const Login = () => {
    const [username, setUsername] = useState('');
    const [password, setPassword] = useState('');
    const [email, setEmail] = useState('');

    const handleSubmit = (e) => {
        console.log('username:', username);
        console.log('password:', password);
        console.log('email:', email);
        e.preventDefault();
    };

    return (
        <form action="php/add-user.php" method="post">
            <h3>Create New Account</h3>
            <div>
                <label>Username:</label>
                <input type="text" name='name' value={username} onChange={(e) => setUsername(e.target.value)} />
            </div>
            <div>
                <label>Password:</label>
                <input type="password" name='password' value={password} onChange={(e) => setPassword(e.target.value)} />
            </div>
            <div>
                <label>Email:</label>
                <input type="email" name='email' value={email} onChange={(e) => setEmail(e.target.value)} />
            </div>
            <div>
                <button type="submit" name='submit'>Submit</button>
            </div>
        </form>
    );
};

ReactDOM.render(<Login />, document.getElementById('newAccount'));