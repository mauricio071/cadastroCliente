#include <stdio.h>
void armadilha()
{
	int n1, n2, num, c = 1;
	srand (time(NULL));
	num = rand() % 100;
	
	do
	{	
		printf("Digite o numero inferior: ");
		scanf("%d",&n1);
		printf("Digite o numero superior: ");
		scanf("%d",&n2);
		if (n1 < num && n2 > num)
				printf("\nEsta entre os seus numeros\n\n");
		else
			if (n1 > num && n2 > num)
				printf("\nNao esta entre eles\n\n");
			else
				if (n1 < num && n2 < num)
					printf("\nNao esta entre eles\n\n");
				else
					{
						printf("\nVoce acertou em %d tentativas o numero %d\n",c,num);
						break;
					}
	c++;
	}while(n1 != num && n2 != num);
}

void estrelas()
{
	int n,c = 1,num;
	srand (time(NULL));
	num = (rand() %96)+32;
	
	do
	{
	printf("\nAdivinhe um valor de 32 a 128: ");
	scanf("%d",&n);
	if (n - num >= 64 || num - n >= 64)
		printf("*");
	else
		if (n - num >= 32 || num - n >= 32)
			printf("**");
		else
			if (n - num >= 16 || num - n >= 16)
				printf("***");
			else 
				if (n - num >= 8 || num - n >= 8)
					printf("****");
				else
					if (n - num >= 4 || num - n >= 4)
						printf("*****");
					else 
						if (n - num >= 2 || num - n >= 2)
							printf("******");
						else
							if (n - num == 1 || num - n == 1)
								printf("*******");
							else
								if (n == num)
									{
										printf("Acertou em %d tentativas",c);
										break;
									}
	c++;							
	}while(num != n);
}	

void main()
{
	int op = 8;
	while (op != 0)
	{	
		printf("\nMenu \n1 - Armadilha \n2 - Estrelas");
		printf("\nDigite a sua opcao ou (0 para sair):");
		scanf("%d",&op);
		
		switch(op)
		{
			case 0:
			break;
			case 1:
			armadilha();
			break;
			case 2:
			estrelas();
			break;
			default:
			printf("Opcao invalida");
		}
	}
}

