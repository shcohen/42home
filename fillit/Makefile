NAME = fillit
FLAGS = -Wall -Wextra -Werror
SRC =	 main.c \
		func.c \
		func2.c \
		list.c \
		reader.c \
		solver.c \
		tetrimino.c \
		map.c

SRCO = $(SRC:.c=.o)

all: $(NAME)

$(NAME): $(SRCO)
	gcc -o $(NAME) $(FLAGS) $(SRCO)

%.o: %.c
	@echo "Building : $<"
	@gcc $(FLAGS) -I fillit.h -c $<

clean:
	rm -f $(SRCO)

fclean: 
	make clean
	rm -f $(NAME)

re: 
	make fclean
	make

.PHONY: all clean fclean re
