/* ************************************************************************** */
/*                                                                            */
/*                                                        :::      ::::::::   */
/*   main.c                                             :+:      :+:    :+:   */
/*                                                    +:+ +:+         +:+     */
/*   By: shcohen <shcohen@student.42.fr>            +#+  +:+       +#+        */
/*                                                +#+#+#+#+#+   +#+           */
/*   Created: 2018/09/13 16:04:24 by shcohen           #+#    #+#             */
/*   Updated: 2018/09/13 18:05:05 by shcohen          ###   ########.fr       */
/*                                                                            */
/* ************************************************************************** */

#include "../include/fillit.h"

int		main(int argc, char **argv)
{
	int	fd;
	char *buf;

	if (argc != 2)
	{
		puts("usage: ./fillit [map with tetriminos]");
		return (1);
	}
	fd = ft_openfile(argv[1]);
	buf = ft_readfile(fd);
	printf("%s", buf);
	ft_closefile(fd);
}