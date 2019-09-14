/* ************************************************************************** */
/*                                                                            */
/*                                                        :::      ::::::::   */
/*   main.c                                             :+:      :+:    :+:   */
/*                                                    +:+ +:+         +:+     */
/*   By: dchampag <marvin@42.fr>                    +#+  +:+       +#+        */
/*                                                +#+#+#+#+#+   +#+           */
/*   Created: 2018/10/04 14:20:40 by dchampag          #+#    #+#             */
/*   Updated: 2018/10/04 14:20:42 by dchampag         ###   ########.fr       */
/*                                                                            */
/* ************************************************************************** */

#include "fillit.h"

int		main(int ac, char **av)
{
	t_map	*map;
	char	*tetris;
	t_list	*tetri_list;

	if (ac != 2)
	{
		ft_putstr("usage: fillit input_file\n");
		return (0);
	}
	if ((tetris = read_file(open(av[1], O_RDONLY))) == NULL)
	{
		ft_putstr("error\n");
		return (0);
	}
	if (!is_filevalid(tetris))
	{
		ft_putstr("error\n");
		return (0);
	}
	tetri_list = get_tetri_list(tetris);
	map = solve(tetri_list);
	print_map(map);
	free_map(map);
	free_all_tetri(tetri_list);
	return (1);
}
