# BasedFileHost

Host your files discretely! 
Meant to be used with [basedapi](https://github.com/rpgwaiter/basedapi). 
Built with [Laravel Livewire](https://github.com/livewire/livewire).
Find us on [DockerHub!](https://hub.docker.com/r/rpgwaiter/basedfilehost)

## Table of Contents

- [Installation & Usage](#installation)
- [Support](#support)
- [Contributing](#contributing)

## Installation & Usage

Clone the repository, create docker-compose.yml from the example, edit the variables for your use case.

```shell script
git clone https://github.com/rpgwaiter/basedfilehost 
cd basedfilehost
cp docker-compose.example.yml docker-compose.yml
nano docker-compose.yml
```

Important variables to keep in mind:

- API_URL: Points to your hosted instance of [basedapi](https://github.com/rpgwaiter/basedapi)
- SECRET_FILEHOST_PATH: Subpath to your files.
- SHORT_NAME: Shows up in the tab name in your browser

Once docker-compose.yml is ready to do, bring the project up.
```shell script
docker-compose up -d
```

## Support

Please [open an issue](https://github.com/rpgwaiter/basedfilehost/issues/new) for support.

## Contributing

Please contribute using [Github Flow](https://guides.github.com/introduction/flow/). Create a branch, add commits, and [open a pull request](https://github.com/rpgwaiter/basedfilehost/compare/).
